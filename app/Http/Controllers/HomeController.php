<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\ObjectId; 
use App\Models\Subcomite;
use App\Models\InfoEstandar;
use App\Models\Estandar;
use App\Models\Programa;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

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

    #USUARIO ORDINARIO
    public function index()
    {
        $subcomite = Subcomite::whereIn('id', Auth::user()->subcomite_ids)->first();
        return view('usuario.home', compact('subcomite'));
    }

    public function adminPrograma()
    {
        $cacheKey = 'programa_' . Auth::user()->programa . '_' . Auth::id();
        
        #$programa = Cache::remember($cacheKey, 60 * 24, function () {
        #    return Programa::with([
        #        'subcomites' => function($query) {
        #            $query->with(['estandares' => function($q) {
        #                // Asegúrate de cargar la relación infoEstandar
        #                $q->with('infoEstandar')
        #                  ->whereHas('infoEstandar'); // Solo estandares con infoEstandar
        #            }]);
        #        }
        #    ])
        #    ->where('nombre', Auth::user()->programa)
        #    ->first();
        #});
        $programa=Auth::user()->programa;
        $subcomites = $programa->subcomites;
        #$usuarios = $subcomites->pluck('usuarios')->flatten(); // Todos los usuarios de los subcomites del programa, pluck para obtener solo los usuarios de cada subcomite y flatten para aplanar el array de arrays
        return view('adminPrograma.home', compact('programa', 'subcomites'));
    }


    public function admin()
    {   
        $programas = Programa::with('adminPrograma')->get();
        return view('administrador.home',compact('programas'));
    }

    /*CREAR USUARIO Y PROGRAMA Y SUBCOMITES y ESTANDARES*/


    public function sideBarAdmin()
    {
        $programas = Programa::all();
        return view('partials.sidebarAdmin')->with('programas',$programas);
    }

    public function sideBarAdminPrograma()
    {
        #$programa = Programa::where('nombre',Auth::user->programa)->first();
        $programa=[
            'nombre'=>'programa1',
            'subcomites'=>[]
        ];
        return view('partials.sidebarAdminPrograma')->with('programa',$programa);
    }

    /*ESTANDARES DE PROGRAMAS */
    public function CrearPrograma(Request $request){

        $validateData = $request->validate([
            'programa'=>'unique:programas,nombre',
            'dni'=>'unique:users,dni'
        ]);

        $infoestandares = InfoEstandar::all();
        $estandares=[];
        foreach($infoestandares as $infoestandar){
            $estandar=Estandar::create();
            $estandar->infoEstandar()->save($infoestandar);
            array_push($estandares,$estandar);
        }
        /*COORDINADOR DE PROGRAMA */

        $coordinador = User::Create([
            'name'=>$request->nombre,
            'lastname'=>$request->apellido,
            'email'=>$request->email,
            'dni'=>$validateData['dni'],
            'password'=>$request->dni,
            'rol'=>'adminPrograma',
            #'subcomite',
            #'programa'=>$request->programa,    -> CREACION CON METODO
        ]);

        $subcomites = collect([
            ['nombre' => 'Gestión Misional del Programa','estandares' => [0, 2, 4, 5, 6, 7, 8, 9, 10, 17, 32]],
            ['nombre' => 'Investigación y Responsabilidad Social Universitaria', 'estandares' => [11, 21, 22, 23, 24, 25]],
            ['nombre' => 'Seguimiento al Egresado', 'estandares' => [1, 32, 33]],
            ['nombre' => 'Seguimiento al Estudiante y Movilidad', 'estandares' => [12, 18, 19]],
            ['nombre' => 'Desarrollo Docente, Administrativo y Actividades Extracurriculares', 'estandares' => [13, 14, 15, 16, 20, 26]],
            ['nombre' => 'Prácticas Pre Profesionales, Recursos, Equipamiento e Infraestructura', 'estandares' => [3, 27, 28, 29, 30, 31]],
        ])->map(function ($data) use ($estandares) {
            $subcomite = Subcomite::create(['nombre' => $data['nombre']]);
            $subcomite->estandares()->saveMany((array_map(fn($index) => $estandares[$index], $data['estandares'])));
            return $subcomite;
        });

        $programa = Programa::create([
            'nombre' => $validateData['programa'],
        ]);
        $programa->adminPrograma()->save($coordinador);
        
        $programa->subcomites()->saveMany($subcomites);

        return redirect()->route('usuario.home');
    }

    #public function CrearUsuario(Request $request, Programa $programa){
    #
    #    $usuario = User::Create([
    #        'name'=>$request->name,
    #        'lastname'=>$request->lastname,
    #        'email'=>$request->email,
    #        'dni'=>$request->dni,
    #        'password'=>$request->dni,
    #        'rol'=>'user',
    #        'programa'=>$request->programa,
    #    ]);
    #    $subcomite = Subcomite::where('id',$request->subcomite)->first();
    #    $subcomite->usuarios()->attach($usuario->id);
    #    $usuario->subcomite = $subcomite->nombre;
    #    $usuario->save();
    #    return redirect()->route('usuario.home');
    #}

    public function usuarios()
    {

        $usuarios = User::all();
        return view('adminPrograma.usuarios',compact('usuarios'));
    }
}