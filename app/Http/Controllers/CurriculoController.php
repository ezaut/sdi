<?php

namespace App\Http\Controllers;

use App\Models\Curriculo;
use Illuminate\Http\Request;
use DataTables;

class CurriculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curriculos = Curriculo::orderBy('created_at', 'DESC')->get();

        return view('curriculo.index', compact('curriculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curriculo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'grupo' => 'required|unique:curriculos,grupo,',
            'descricao' => 'required',
            'link_documento' => 'required',
            'pontos' => 'required',
            'user_id' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'unique' => 'O campo :attribute já está sendo utilizado.',
        ];

        $request->validate($regras, $feedback);
        //dd($request);
        Curriculo::create($request->all());

        return redirect()->route('curriculo.index')->with('success', 'Curriculo adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculo.show', compact('curriculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculo.edit', compact('curriculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'grupo' => 'required|unique:curriculos,grupo,',
            'descricao' => 'required',
            'link_documento' => 'required',
            'pontos' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'unique' => 'O campo :attribute já está sendo utilizado.',
        ];

        $request->validate($regras, $feedback);

        $curriculo = Curriculo::findOrFail($id);

        $curriculo->update($request->all());

        return redirect()->route('curriculo.index')->with('success', 'Curriculo atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curriculo = Curriculo::findOrFail($id);

        $curriculo->forceDelete();

        return redirect()->route('curriculo.index')->with('success', 'Curriculo excluído com sucesso');
    }
}
