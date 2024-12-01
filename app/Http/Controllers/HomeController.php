<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subcomite;
use App\Models\Estandar;
use App\Models\Programa;

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

    public function redirect()
    {
        if(Auth::user()->rol == 'adminPrograma'){
            return $this->adminPrograma();
        }
        else {
            if (Auth::user()->rol == 'admin') {
                return $this->admin();
            } else {
                return $this->index();
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subcomite = Subcomite::where('nombre', Auth::user()->subcomite)->first();
        $estandares = Estandar::whereIn('id', $subcomite->estandares)->get();
        return view('usuario.home', compact('subcomite', 'estandares'));
    }

    public function adminPrograma()
    {
        $subcomites = Subcomite::all();
        $estandares = Estandar::all();
        return view('adminPrograma.home', compact('subcomites', 'estandares'));
    }

    public function admin()
    {   
        $programas = Programa::all();
        return view('administrador.home',compact('programas'));
    }
}