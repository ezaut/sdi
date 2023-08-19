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
        //$user = User::findOrFail($id);
        return view('user.create');
    }

    public function add_user_info_store (Request $request)
    {
        if($request->input('_token') !=''){

            $regras = [
                'name' => 'required|string|min:3',
                'email' => 'required|email|unique:'.User::class,
                'password' => 'required', Rules\Password::defaults(),
                'cpf' => 'required|integer|unique:'.User::class,
                'sexo' => 'required|string|min:1|max:1',
                'nome_mae' => 'required|string',
                'dt_nascimento' => 'required|date',
                'escolaridade' => 'required|string',
                'grupo' => 'required|string',
                'endereco' => 'required|string',
                'complemento' => '',
                'bairro' => 'required|string',
                'cidade' => 'required|string',
                'uf' => 'required|string|min:2|max:2',
                'cep' => 'required|string|min:10|max:10',
                'rg' => 'required|integer',
                'org_exp' => 'required|string',
                'dt_emissao' => 'required|date',
                'telefone' => 'required|string',
            ];

            $feedback = [
                'required'      => 'O campo :attribute é obrigatório.',
                'string'        => 'O campo :attribute deve ser uma string.',
                'name.min'      => 'O campo :attribute deve ter pelo menos :min caracteres.',
                'unique'        => 'O campo :attribute já está sendo utilizado.',
                'email'         => 'O campo :attribute deve ser um endereço de e-mail válido.',
                'integer'       => 'O campo :attribute deve ser um número inteiro.',
                'sexo.min'      => 'O campo :attribute deve ter pelo menos :min caracteres.',
                'sexo.max'      => 'O campo :attribute não pode ser superior a :max.',
                'date'          => 'O campo :attribute não é uma data válida.',
                'uf.min'        => 'O campo :attribute deve ter pelo menos :min caracteres.',
                'uf.max'        => 'O campo :attribute não pode ser superior a :max.',
            ];

            $request->validate($regras, $feedback);

            $user = new User();
            $user->create($request->all());

        }
        return redirect()->route('home')->with('success', 'Seus dados foram atualizados com sucesso');
    }

    public function add_user_info_edit (User $user)
    {
        $user = User::findOrFail($user);

        return view('user.edit', compact('user'));
    }


    public function add_user_info_update (Request $request, string $user)
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
        User::findOrFail($user)->update($request->all());


        return redirect()->route('home')->with('success', 'Seus dados foram atualizados com sucesso');
    }
}
