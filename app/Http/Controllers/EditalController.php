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
        $edital = Edital::orderBy('created_at', 'DESC')->get();

        return view('edital.index', compact('edital'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('edital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome_edital' => 'required|min:3|max:100|unique:editals,nome_edital,',
            'dt_inicio' => 'required',
            'dt_fim' => 'required',

        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome_edital.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome_edital.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'unique' => 'O campo :attribute já está sendo utilizado.',
        ];

        $request->validate($regras, $feedback);

        Edital::create($request->all());

        return redirect()->route('edital.index')->with('success', 'Edital adicionado com sucesso');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $edital = Edital::findOrFail($id);

        return view('edital.show', compact('edital'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edital = Edital::findOrFail($id);

        return view('edital.edit', compact('edital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'nome_edital' => 'required|min:3|max:100|unique:editals,nome_edital,',
            'dt_inicio' => 'required',
            'dt_fim' => 'required',

        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome_edital.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome_edital.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'unique' => 'O campo :attribute já está sendo utilizado.',
        ];

        $request->validate($regras, $feedback);

        $edital = Edital::findOrFail($id);

        $edital->update($request->all());

        return redirect()->route('edital.index')->with('success', 'Edital atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $edital = Edital::findOrFail($id);

        $edital->forceDelete();

        return redirect()->route('edital.index')->with('success', 'Edital excluído com sucesso');
    }


}
