<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edital;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $edital = Edital::orderBy('created_at', 'DESC')->get();
        return view('home', compact('edital'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $users = User::all();
        return view('admin.adminHome', compact('users'));
    }


    /**
     * Muda o tipo de usuário para: 0-padrão 1-admin 2-supervisor
     *
     */
    public function updateUserType(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->type = $request->input('new_type');
        $user->save();

        return redirect()->route('admin.home')->with('success', 'Tipo do usuário atualizado com sucesso.');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function servidorHome()
    {
        return view('servidor.servidorHome');
    }

}
