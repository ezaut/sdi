<?php

namespace App\Http\Controllers;

use App\Models\Pontuacoe;
use App\Models\Oferta;
use Illuminate\Http\Request;
use DataTables;

class PontuacoeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        $pontuacoes = Pontuacoe::with(['oferta'])->get();
        $ofertas = Oferta::all();
        return view('pontuacoe-list', ['pontuacoes' => $pontuacoes, 'ofertas' => $ofertas, 'request' => $request->all() ]);
    }

    //ADD NEW PONTUAÇÃO
    public function addPontuacoe(Request $request){

         $validator = \Validator::make($request->all(),[
             'grupo'=>'required|unique:pontuacoes',
             'pontos'=>'required',
             'pontuacao_max'=>'required',
             'descricao'=>'required',
             'oferta_id'=>'exists:ofertas,id'
         ]);

         if(!$validator->passes()){
              return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
         }else{

             $query = Pontuacoe::create($request->all());

             if(!$query){
                 return response()->json(['code'=>0,'msg'=>'Algo deu errado']);
             }else{
                 return response()->json(['code'=>1,'msg'=>'Nova pontuação foi salva com sucesso']);
             }
         }
    }

    // GET ALL PONTUAÇÕES
    public function getPontuacoesList(){
          $pontuacoes = Pontuacoe::with('oferta')->get();

          return DataTables::of($pontuacoes)
                              ->addIndexColumn()
                              ->addColumn('actions', function($row){
                                  return '<div class="btn-group">
                                                <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editPontuacoeBtn">Update</button>
                                                <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deletePontuacoeBtn">Delete</button>
                                          </div>';
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
    }

    //GET PONTUAÇÃO DETAILS
    public function getPontuacoeDetails(Request $request){
        $id = $request->id;
        $pontuacoeDetails = Pontuacoe::find($id);
        return response()->json(['details'=>$pontuacoeDetails]);
    }

    //UPDATE PONTUAÇÃO DETAILS
    public function updatePontuacoeDetails(Request $request){
        $id = $request->pid;

        $validator = \Validator::make($request->all(),[
             'grupo'=>'required|unique:pontuacoes,grupo,'.$id,
             'pontos'=>'required',
             'pontuacao_max'=>'required',
             'descricao'=>'required',
             'oferta_id'=>'exists:ofertas,id'

        ]);

        if(!$validator->passes()){
               return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $query = Pontuacoe::find($id)->update($request->all());
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Os detalhes de pontuações foram atualizados']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Algo deu errado']);
            }
        }
    }

    // DELETE PONTUAÇÃO RECORD
    public function deletePontuacoe(Request $request){
        $id = $request->id;
        $query = Pontuacoe::find($id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'A pontuação foi excluída do banco de dados']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Algo deu errado']);
        }
    }


}
