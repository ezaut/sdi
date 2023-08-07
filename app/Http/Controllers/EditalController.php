<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use Illuminate\Http\Request;
use DataTables;

class EditalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('edital-list');
    }

    //ADD NEW EDITAL
    public function addEdital(Request $request){
         $validator = \Validator::make($request->all(),[
             'nome_edital'=>'required|unique:editals',
             'dt_inicio'=>'required',
             'dt_fim'=>'required',
         ]);

         if(!$validator->passes()){
              return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
         }else{
             $edital = new Edital();
             $edital->nome_edital = $request->nome_edital;
             $edital->dt_inicio = $request->dt_inicio;
             $edital->dt_fim = $request->dt_fim;
             $query = $edital->save();

             if(!$query){
                 return response()->json(['code'=>0,'msg'=>'Algo deu errado']);
             }else{
                 return response()->json(['code'=>1,'msg'=>'Novo edital foi salvo com sucesso']);
             }
         }
    }

    // GET ALL EDITAIS
    public function getEditaisList(){
          $editals = Edital::all();
          return DataTables::of($editals)
                              ->addIndexColumn()
                              ->addColumn('actions', function($row){
                                  return '<div class="btn-group">
                                                <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editEditalBtn">Update</button>
                                                <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteEditalBtn">Delete</button>
                                          </div>';
                              })
                              ->rawColumns(['actions'])
                              ->make(true);
    }

    //GET EDITAL DETAILS
    public function getEditalDetails(Request $request){
        $id = $request->id;
        $editalDetails = Edital::find($id);
        return response()->json(['details'=>$editalDetails]);
    }

    //UPDATE EDITAL DETAILS
    public function updateEditalDetails(Request $request){
        $id = $request->eid;

        $validator = \Validator::make($request->all(),[
            'nome_edital'=>'required|unique:editals,nome_edital,'.$id,
            'dt_inicio'=>'required',
            'dt_fim'=>'required',
        ]);

        if(!$validator->passes()){
               return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $edital = Edital::find($id);
            $edital->nome_edital = $request->nome_edital;
            $edital->dt_inicio = $request->dt_inicio;
            $edital->dt_fim = $request->dt_fim;
            $query = $edital->save();

            if($query){
                return response()->json(['code'=>1, 'msg'=>'Os detalhes de editais foram atualizados']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Algo deu errado']);
            }
        }
    }

    // DELETE EDITAL RECORD
    public function deleteEdital(Request $request){
        $id = $request->id;
        $query = Edital::find($id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'O edital foi excluído do banco de dados']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Algo deu errado']);
        }
    }
}
