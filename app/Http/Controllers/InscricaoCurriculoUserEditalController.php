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
        $user = User::findOrFail(Auth::user()->id);
        $curriculo = $user->curriculo;


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

        $curr = Curriculo::findOrFail($curriculo_id);

        //$user = User::findOrFail($id);
        //$ins = Inscricao_curriculo_user_edital::create(['edital', 'user', 'curriculo']);
        //return response()->json($ed);
        return view('inscricoes.criar', compact('ed', 'ofertas', 'curr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'vaga_escolhida'    =>'required',
        ];

        $feedback = [
            'required'          => 'O campo :attribute deve ser preenchido',
        ];

        $request->validate($regras, $feedback);

        $teste_inscricao = Inscricao_curriculo_user_edital::where('user_id', $request->user_id)
        ->where('edital_id', $request->edital_id)
        ->get();
        /**
         * verificar para nao permetir inscrição na mesma vaga duas vezes
         */
        if($teste_inscricao){
            foreach ($teste_inscricao as $teste) {
                $teste->delete();
            }

        }

        $data = $request->all();

        Inscricao_curriculo_user_edital::create($data);

        return redirect()->route('home')->with('success', 'A inscrição foi realizada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show_inscricoes_user(string $id)
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
        $inscricoes = Inscricao_curriculo_user_edital::where('edital_id', $edital_id)->with(['edital', 'user', 'curriculo'])->orderBy('created_at', 'DESC')->get();
        // recupero cada curriculo de cada inscricao
        return view("servidor.inscricoes", compact('inscricoes', 'edital'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscricao_curriculo_user_edital $inscricao)
    {


        return view("servidor.edit", compact('inscricao'));
    }


    /**
     * Show the specified inscrição
     */
    public function show(Inscricao_curriculo_user_edital $inscricao)
    {
        return view("servidor.show", compact('inscricao'));
        //return response()->route('servidor.show')->json($inscricao);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscricao_curriculo_user_edital $inscricao)
    {
        $inscricao->curriculo()->update($request->except(['_token', '_method']));

        return redirect()->route('servidor.inscricoes.show', $inscricao->edital_id)->with('success', 'Inscrição atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscricao_curriculo_user_edital $inscricao)
    {

        return Response()->json($inscricao);
    }
}
