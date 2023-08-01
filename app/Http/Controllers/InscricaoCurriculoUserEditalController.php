<?php

namespace App\Http\Controllers;

use App\Models\Inscricao_curriculo_user_edital;
use Illuminate\Http\Request;
use Datatables;

class InscricaoCurriculoUserEditalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Inscricao_curriculo_user_edital::select('*'))
            ->addColumn('action', 'servidor/actions/inscricao-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('servidor.actions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inscricaoId = $request->inscricao_id;

        $incricao   =   Inscricao_curriculo_user_edital::updateOrCreate(
                    [
                     'inscricao_id' => $inscricaoId
                    ],
                    [
                    'vaga_escolhida' => $request->vaga_escolhida,

                    ]);

        return Response()->json($inscricao);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscricao_curriculo_user_edital $inscricao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $where = array('inscricao_id' => $request->inscricao_id);
        $inscricao  = Inscricao_curriculo_user_edital::where($where)->first();

        return Response()->json($inscricao);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscricao_curriculo_user_edital $inscricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $inscricao = Inscricao_curriculo_user_edital::where('inscricao_id',$request->inscricao_id)->delete();

        return Response()->json($inscricao);
    }
}
