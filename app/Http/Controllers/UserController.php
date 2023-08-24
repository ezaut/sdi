<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function add_user_info_show (User $user)
    {
        $user = User::findOrFail($user);
        return view('user.show', 'user');
    }

    public function add_user_info_create ()
    {

        return view('user.create');
    }

    public function add_user_info_store (Request $request)
    {
        if($request->input('_token') !=''){

            $regras = [
                'sexo' => 'required|string|min:1|max:100',
                'nome_mae' => 'required|string|min:3',
                'dt_nascimento' => 'required|date',
                'escolaridade' => 'required|string',
                'grupo' => 'required|string',
                'endereco' => 'required|string',
                'complemento' => '',
                'bairro' => 'required|string',
                'cidade' => 'required|string',
                'uf' => 'required|string|size:2',
                'cep' => 'required|string|size:10',
                'rg' => 'required|integer',
                'org_exp' => 'required|string',
                'dt_emissao' => 'required|date',
                'telefone' => 'required|string',
            ];

            $feedback = [
                'required'      => 'O campo :attribute é obrigatório.',
                'string'        => 'O campo :attribute deve ser uma string.',
                'nome_mae.min'  => 'O campo :attribute deve ter pelo menos :min caracteres.',
                'unique'        => 'O campo :attribute já está sendo utilizado.',
                'email'         => 'O campo :attribute deve ser um endereço de e-mail válido.',
                'integer'       => 'O campo :attribute deve ser um número inteiro.',
                'sexo.min'      => 'O campo :attribute deve ter pelo menos :min caracteres.',
                'sexo.max'      => 'O campo :attribute não pode ser superior a :max.',
                'date'          => 'O campo :attribute não é uma data válida.',
                'uf.size'       => 'O campo :attribute deve ter só :min caracteres.',
                'cep.size'      => 'O campo :attribute deve ter :min caracteres. Formato: 00.000-000',
            ];

            $request->validate($regras, $feedback);

            $user = new User();
            $user->create($request->all());
            return redirect()->route('home')->with('success', 'Seus dados foram atualizados com sucesso');
        }else{
            return redirect()->route('candidato.edit')->with('danger', 'Erro ao atualizar seus dados, faltou atualizar algum campo.');
        }

    }

    public function add_user_info_edit (String $id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }


    public function add_user_info_update (Request $request, string $user)
    {
        if ($request->input('_token') !='') {
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
                'string'        => 'O campo :attribute deve ser uma string.',
                'nome_mae.min'  => 'O campo :attribute deve ter pelo menos :min caracteres.',
                'unique'        => 'O campo :attribute já está sendo utilizado.',
                'email'         => 'O campo :attribute deve ser um endereço de e-mail válido.',
                'integer'       => 'O campo :attribute deve ser um número inteiro.',
                'sexo.min'      => 'O campo :attribute deve ter pelo menos :min caracteres.',
                'sexo.max'      => 'O campo :attribute não pode ser superior a :max.',
                'date'          => 'O campo :attribute não é uma data válida.',
                'uf.size'       => 'O campo :attribute deve ter só :min caracteres.',
                'cep.size'      => 'O campo :attribute deve ter :min caracteres. Formato: 00.000-000',
            ];
            $request->validate($regras, $feedback);
            User::findOrFail($user)->update($request->all());
            return redirect()->route('home')->with('success', 'Seus dados foram atualizados com sucesso');
        }else{
            return redirect()->route('candidato.edit')->with('warning', 'Erro ao atualizar seus dados, faltou atualizar algum campo.');
        }
    }
}
