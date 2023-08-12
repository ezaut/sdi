<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edital;

class HomeSeadController extends Controller
{
    public function index(){

        $edital = Edital::orderBy('created_at', 'DESC')->get();

        return view('home_sead', compact('edital'));
    }
}
