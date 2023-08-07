<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Edital;
use Illuminate\Http\Request;
use DataTables;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        $ofertas = Oferta::with(['edital'])->get();
        $editais = Edital::all();
        return view('oferta-list', ['ofertas' => $ofertas, 'editais' => $editais, 'request' => $request->all() ]);
    }

    //ADD NEW OFERTA
    public function addOferta(Request $request){

         $validator = \Validator::make($request->all(),[
             'curso'=>'required|unique:ofertas',
             'disciplina'=>'required',
             'edital_id'=>'exists:editals,id'
         ]);

         if(!$validator->passes()){
              return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
         }else{

             $query = Oferta::create($request->all());

             if(!$query){
                 return response()->json(['code'=>0,'msg'=>'Algo deu errado']);
             }else{
                 return response()->json(['code'=>1,'msg'=>'Nova oferta foi salva com sucesso']);
             }
         }
    }

    // GET ALL OFERTAS
    public function getOfertasList(){
          $ofertas = Oferta::with('edital')->get();

          return DataTables::of($ofertas)
                              ->addIndexColumn()
                              ->addColumn('actions', function($row){
                                  return '<div class="btn-group">
                                                <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editOfertaBtn">Update</button>
                                                <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteOfertaBtn">Delete</button>
                                          </div>';
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
    }

    //GET OFERTA DETAILS
    public function getOfertaDetails(Request $request){
        $id = $request->id;
        $ofertaDetails = Oferta::find($id);
        return response()->json(['details'=>$ofertaDetails]);
    }

    //UPDATE OFERTA DETAILS
    public function updateOfertaDetails(Request $request){
        $id = $request->oid;

        $validator = \Validator::make($request->all(),[
            'curso'=>'required|unique:ofertas,curso,'.$id,
            'disciplina'=>'required',
            'edital_id'=>'exists:editals,id'

        ]);

        if(!$validator->passes()){
               return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $query = Oferta::find($id)->update($request->all());
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Os detalhes de ofertas foram atualizados']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Algo deu errado']);
            }
        }
    }

    // DELETE OFERTA RECORD
    public function deleteOferta(Request $request){
        $id = $request->id;
        $query = Oferta::find($id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'A oferta foi excluída do banco de dados']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Algo deu errado']);
        }
    }
}
