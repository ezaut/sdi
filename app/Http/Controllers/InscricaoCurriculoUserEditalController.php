<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
        $curriculo = Curriculo::orderBy('created_at', 'DESC')->get();

        return view('inscricoes.inscricao', compact('edital', 'curriculo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $edital_id, string $curriculo_id)
    {
        $ed = Edital::findOrFail($edital_id);
        //$ofertas = Oferta::where('edital_id', '=', $id)->get();
        $ofertas = Edital::find($edital_id)->ofertas;
        $edital = Edital::with(['ofertas'])->orderBy('created_at', 'DESC')->get();
        $curr = Curriculo::findOrFail($curriculo_id);

        //$user = User::findOrFail($id);
        //$ins = Inscricao_curriculo_user_edital::create(['edital', 'user', 'curriculo']);
        //return response()->json($ed);
        return view('inscricoes.criar', compact('ed', 'edital', 'ofertas', 'curr'));
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

        //User::findOrFail($request->id)->update($request->all());
        Inscricao_curriculo_user_edital::create($request->all());

        return redirect()->route('home')->with('success', 'A inscrição foi realizada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show_inscricoes_user(User $id)
    {
        // busco as inscrições que contem o id do usuário
        $inscricoes = Inscricao_curriculo_user_edital::where('user_id', '=', $id)->get();
        return view("user.inscricoes", compact('inscricoes'));
    }

    public function show_inscricoes_edital(string $edital_id)
    {
        // busco o edital em questao
        $edital = Edital::findOrFail($edital_id);
        // recupero as inscrições desse edital
        $inscricoes = $edital->inscricao_curriculo_user_editals;
        // recupero cada curriculo de cada inscricao
        return view("servidor.inscricoes", compact('inscricoes', 'edital'));
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
