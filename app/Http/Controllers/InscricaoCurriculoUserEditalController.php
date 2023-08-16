<?php

namespace App\Http\Controllers;

use App\Models\Inscricao_curriculo_user_edital;
use Illuminate\Http\Request;
use Datatables;
use App\Models\Edital;
use App\Models\User;
use App\Models\Curriculo;
use App\Models\Oferta;

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
        //$ofertas = Oferta::where('edital_id', '=', $id)->get();
        $ofertas = Edital::find($id)->ofertas;
        $edital = Edital::with(['ofertas'])->orderBy('created_at', 'DESC')->get();

        //$user = User::findOrFail($id);
        //$ins = Inscricao_curriculo_user_edital::create(['edital', 'user', 'curriculo']);
        //return response()->json($ed);
        return view('inscricoes.criar', compact('ed', 'edital', 'ofertas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Inscricao_curriculo_user_edital $inscricao)
    {
        $regras = [
            'vaga_escolhida'    =>'required',

        ];

        $feedback = [
            'required'          => 'O campo :attribute deve ser preenchido',

        ];

        $request->validate($regras, $feedback);

        User::findOrFail($request->id)->update($request->all());
        Inscricao_curriculo_user_edital::create($inscricao->all());

        return redirect()->route('home')->with('success', 'A inscrição foi realizada com sucesso');
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
