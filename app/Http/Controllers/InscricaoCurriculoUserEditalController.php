<?php

namespace App\Http\Controllers;

use App\Models\Inscricao_curriculo_user_edital;
use Illuminate\Http\Request;
use Datatables;
use App\Models\Edital;

class InscricaoCurriculoUserEditalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $edital = Edital::orderBy('created_at', 'DESC')->get();

        return view('inscricoes.inscricao', compact('edital'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $ed = Edital::findOrFail($id);
        //return response()->json($ed);
        return view('inscricoes.criar', compact('ed'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Inscricao_curriculo_user_edital $inscricao)
    {

        return Response()->json($request);
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
    public function edit(Inscricao_curriculo_user_edital $inscricao)
    {


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
    public function destroy(Inscricao_curriculo_user_edital $inscricao)
    {

        return Response()->json($inscricao);
    }
}
