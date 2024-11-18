<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subcomite;
use App\Models\Estandar;

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
        //encontrar el subcomite del usuario
        $subcomite = Subcomite::where('nombre', Auth::user()->subcommittee)->first();
        return view('usuario.home', compact('subcomite'));
    }
}