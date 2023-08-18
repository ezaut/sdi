<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function add_user_info_show (string $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function add_user_info_store (Request $request, string $id)
    {
        $regras = [
            'nome_mae' => 'required',
            'dt_nascimento' => 'required',
            'escolaridade' => 'required',
            'grupo' => 'required',
            'endereco' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required | min:2 | max:2',
            'cep' => 'required | min:8 | max:10',
            'rg' => 'required',
            'org_exp' => 'required',
            'dt_emissao' => 'required',
            'telefone' => 'required',
            'sexo' => 'required | min:1 | max:100',

        ];

        $feedback = [
            'required'          => 'O campo :attribute deve ser preenchido',

        ];
        $request->validate($regras, $feedback);
        User::findOrFail($id)->update($request->all());


        return redirect()->route('home')->with('success', 'Seus dados foram atualizados com sucesso');
    }
}
