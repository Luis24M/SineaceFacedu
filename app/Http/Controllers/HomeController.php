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
    public function index()
    {
        $subcomite = Subcomite::where('nombre', Auth::user()->subcomite)->first();
        $estandares = Estandar::whereIn('id', $subcomite->estandares)->get();
        return view('usuario.home', compact('subcomite', 'estandares'));
    }

    public function adminPrograma()
{
    // Use a more granular cache key
    $cacheKey = 'programa_' . Auth::user()->programa . '_' . Auth::id();
    
    $programa = Cache::remember($cacheKey, 60 * 24, function () {
        return Programa::with([
            'subcomites' => function($query) {
                // Only load necessary relations
                $query->with(['estandares' => function($q) {
                    $q->with('infoEstandar:indice'); // Select only the needed column
                }]);
            }
        ])
        ->where('nombre', Auth::user()->programa)
        ->first();
    });

    $subcomites = $programa->subcomites;

    return view('adminPrograma.home', compact('programa', 'subcomites'));
}


    public function admin()
    {   
        $programas = Programa::with('usuario')->get();
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

        $infoestandares = InfoEstandar::all();
        $estandares=[];
        foreach($infoestandares as $infoestandar){
            $estandar=Estandar::create([
                'contextualizacion',
                'criterios'=>[],
            ]);
            $estandar->infoEstandar()->save($infoestandar);
            array_push($estandares,$estandar);
        }
        /*COORDINADOR DE PROGRAMA */

        $coordinador = User::Create([
            'name'=>$request->nombre,
            'lastname'=>$request->apellido,
            'email'=>$request->email,
            'dni'=>$request->dni,
            'password'=>$request->dni,
            'rol'=>'adminPrograma',
            'subcomite',
            'programa'=>$request->programa,
        ]);

        /*SUBCOMITES DE PROGRAMA */
        $subcomite1=Subcomite::Create([
            'nombre'=>'Gestion Misional Del Programa',
            'usuarios'=>[],
        ]);
        $subcomite1->estandares()->attach($estandares[0]);
        $subcomite1->estandares()->attach($estandares[2]);
        $subcomite1->estandares()->attach($estandares[4]);
        $subcomite1->estandares()->attach($estandares[5]);
        $subcomite1->estandares()->attach($estandares[6]);
        $subcomite1->estandares()->attach($estandares[7]);
        $subcomite1->estandares()->attach($estandares[8]);
        $subcomite1->estandares()->attach($estandares[9]);
        $subcomite1->estandares()->attach($estandares[10]);
        $subcomite1->estandares()->attach($estandares[17]);
        $subcomite1->estandares()->attach($estandares[32]);

        $subcomite2=Subcomite::Create([
            'nombre'=>'Investigacion y Responsabilidad Social Universitaria',
            'usuarios'=>[],
        ]);
        $subcomite2->estandares()->attach($estandares[11]);
        $subcomite2->estandares()->attach($estandares[21]);
        $subcomite2->estandares()->attach($estandares[22]);
        $subcomite2->estandares()->attach($estandares[23]);
        $subcomite2->estandares()->attach($estandares[24]);
        $subcomite2->estandares()->attach($estandares[25]);

        $subcomite3=Subcomite::Create([
            'nombre'=>'Seguimiento al Egresado',
            'usuarios'=>[]
        ]);
        $subcomite3->estandares()->attach($estandares[1]);
        $subcomite3->estandares()->attach($estandares[32]);
        $subcomite3->estandares()->attach($estandares[33]);

        $subcomite4=Subcomite::Create([
            'nombre'=>'Seguimiento al Estudiante y Movilidad',
            'usuarios'=>[],
        ]);
        $subcomite4->estandares()->attach($estandares[12]);
        $subcomite4->estandares()->attach($estandares[18]);
        $subcomite4->estandares()->attach($estandares[19]);

        $subcomite5=Subcomite::Create([
            'nombre'=>'Desarrollo Docente, Administrativo y Actividades Extracurriculares',
            'usuarios'=>[],
        ]);
        $subcomite5->estandares()->attach($estandares[13]);
        $subcomite5->estandares()->attach($estandares[14]);
        $subcomite5->estandares()->attach($estandares[15]);
        $subcomite5->estandares()->attach($estandares[16]);
        $subcomite5->estandares()->attach($estandares[20]);
        $subcomite5->estandares()->attach($estandares[26]);


        $subcomite6=Subcomite::Create([
            'nombre'=>'Practicas Pre Profesionales, Recursos, Equipamiento e Infraestructura',
            'usuarios'=>[],
        ]);
        $subcomite6->estandares()->attach($estandares[3]);
        $subcomite6->estandares()->attach($estandares[27]);
        $subcomite6->estandares()->attach($estandares[28]);
        $subcomite6->estandares()->attach($estandares[29]);
        $subcomite6->estandares()->attach($estandares[30]);
        $subcomite6->estandares()->attach($estandares[31]);

        $programa=Programa::Create([
            'nombre'=>$request->programa,
            'adminPrograma'=>new ObjectId($coordinador->_id)
        ]);
        $programa->subcomites()->attach($subcomite1);
        $programa->subcomites()->attach($subcomite2);
        $programa->subcomites()->attach($subcomite3);
        $programa->subcomites()->attach($subcomite4);
        $programa->subcomites()->attach($subcomite5);
        $programa->subcomites()->attach($subcomite6);

        return redirect()->route('usuario.home');
    }

}