<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; 
use App\Models\Registro;
use App\Models\Formulario;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $blogs = Blog::where('enabled',true)->orderByDesc('created_at')->get();
        return view('welcome', compact('blogs'));
    }

    public function registros()
    {
        $registros = Registro::all(); 
        return view('registro', compact('registros'));
    }

    public function formularios()
    {
        $formularios = Formulario::all();
        return view('formulario', compact('formularios'));
    }

}
