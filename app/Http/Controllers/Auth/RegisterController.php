<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cpf' => ['required', 'integer','unique:'.User::class],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nome_mae' => ['string'],
            'dt_nascimento' => ['date'],
            'escolaridade' => ['string'],
            'grupo' => ['string'],
            'endereco' => ['string'],
            'complemento' => ['string'],
            'bairro' => ['string'],
            'cidade' => ['string'],
            'uf' => ['string','min:2','max:2'],
            'cep' => ['string','min:8','max:10'],
            'rg' => ['integer'],
            'org_exp' => ['string'],
            'dt_emissao' => ['date'],
            'telefone' => ['string'],
            'sexo' => ['string','min:1','max:100'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'cpf' => $data['cpf'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nome_mae' => $data['nome_mae'] ?? null,
            'dt_nascimento' => $data['dt_nascimento'] ?? null,
            'escolaridade' => $data['escolaridade'] ?? null,
            'grupo' => $data['grupo'] ?? null,
            'endereco' => $data['endereco'] ?? null,
            'complemento' => $data['complemento'] ?? null,
            'bairro' => $data['bairro'] ?? null,
            'cidade' => $data['cidade'] ?? null,
            'uf' => $data['uf'] ?? null,
            'cep' => $data['cep'] ?? null,
            'rg' => $data['rg'] ?? null,
            'org_exp' => $data['org_exp'] ?? null,
            'dt_emissao' => $data['dt_emissao'] ?? null,
            'telefone' => $data['telefone'] ?? null,
            'sexo' => $data['sexo'] ?? null,
        ]);
    }
}
