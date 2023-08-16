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
        $oferta = Oferta::with(['edital'])->orderBy('created_at', 'DESC')->get();


        return view('oferta.index', compact('oferta', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $editais = Edital::all();
        return view('oferta.create', compact('editais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'curso'      =>'required|unique:ofertas',
            'disciplina' =>'required',
            'edital_id'  =>'exists:editals,id'

        ];

        $feedback = [
            'required'           => 'O campo :attribute deve ser preenchido',
            'edital_id.exists'   => 'O campo :attribute selecionado é inválido.',
            'unique'             => 'O campo :attribute já está sendo utilizado.',
        ];

        $request->validate($regras, $feedback);

        Oferta::create($request->all());

        //return redirect()->route('oferta.index')->with('success', 'A oferta foi adicionada com sucesso');
        /**
         * Ao inserir uma nova oferta, ja redireciona para a página de inserção de pontuação da oferta
         *
         * ToDo
         * verificar se o usuário deseja inserir mais uma oferta
         */
        return redirect()->action(PontuacoeController::class, 'create')->with('success', 'A oferta foi adicionada com sucesso');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $oferta = Oferta::findOrFail($id);

        return view('oferta.show', compact('oferta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $oferta = Oferta::findOrFail($id);
        $editais = Edital::all();

        return view('oferta.edit', compact('oferta', 'editais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'curso'      =>'required|unique:ofertas',
            'disciplina' =>'required',
            'edital_id'  =>'exists:editals,id'

        ];

        $feedback = [
            'required'           => 'O campo :attribute deve ser preenchido',
            'edital_id.exists'   => 'O campo :attribute selecionado é inválido.',
            'unique'             => 'O campo :attribute já está sendo utilizado.',
        ];

        $request->validate($regras, $feedback);

        $oferta = Oferta::findOrFail($id);

        $oferta->update($request->all());

        return redirect()->route('oferta.index')->with('success', 'A oferta foi atualizada com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $oferta = Oferta::findOrFail($id);

        $oferta->delete();

        return redirect()->route('oferta.index')->with('success', 'A oferta foi excluída com sucesso');
    }

}
