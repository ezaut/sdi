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
        $pontuacao = Pontuacoe::with(['oferta'])->orderBy('created_at', 'DESC')->get();

        return view('pontuacao.index', compact('pontuacao'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ofertas = Oferta::all();
        return view('pontuacao.create', compact('ofertas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'grupo'             =>'required|unique:pontuacoes',
            'pontos'            =>'required',
            'pontuacao_max'     =>'required',
            'descricao'         =>'required',
            'oferta_id'         =>'exists:ofertas,id'

        ];

        $feedback = [
            'required'          => 'O campo :attribute deve ser preenchido',
            'oferta_id.exists'  => 'O campo :attribute selecionado é inválido.',
            'unique'            => 'O campo :attribute já está sendo utilizado.',
        ];

        $request->validate($regras, $feedback);

        Pontuacoe::create($request->all());

        return redirect()->route('pontuacao.index')->with('success', 'A pontuação foi adicionada com sucesso');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pontuacao = Pontuacoe::findOrFail($id);

        return view('pontuacao.show', compact('pontuacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pontuacao = Pontuacoe::findOrFail($id);
        $ofertas = Oferta::all();

        return view('pontuacao.edit', compact('pontuacao', 'ofertas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'grupo'             =>'required|unique:pontuacoes',
            'pontos'            =>'required',
            'pontuacao_max'     =>'required',
            'descricao'         =>'required',
            'oferta_id'         =>'exists:ofertas,id'

        ];

        $feedback = [
            'required'            => 'O campo :attribute deve ser preenchido.',
            'oferta_id.exists'    => 'O campo :attribute selecionado é inválido.',
            'unique'              => 'O campo :attribute já está sendo utilizado.',
        ];

        $request->validate($regras, $feedback);

        $pontuacao = Pontuacoe::findOrFail($id);

        $pontuacao->update($request->all());

        return redirect()->route('pontuacao.index')->with('success', 'A pontuação foi atualizada com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pontuacao = Pontuacoe::findOrFail($id);

        $pontuacao->delete();

        return redirect()->route('pontuacao.index')->with('success', 'A pontuação foi excluída com sucesso');
    }
}
