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
        $programas = Programa::with('usuario')->get();
        return view('administrador.home',compact('programas'));
    }

    /*CREAR USUARIO Y PROGRAMA Y SUBCOMITES y ESTANDARES*/

    /*ESTANDARES DE PROGRAMAS */
    public function CrearPrograma(Request $request){

        $infoestandares = InfoEstandar::all();
        $estandares=[];
        foreach($infoestandares as $infoestandar){
            $estandar=Estandar::create([
                'infoestandar'=>new ObjectId($infoestandar->id),
                'contextualizacion',
                'criterios'=>[],
            ]);
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
            'estandares'=>[new ObjectId($estandares[0]->_id),
            new ObjectId($estandares[2]->_id),
            new ObjectId($estandares[4]->_id),
            new ObjectId($estandares[5]->_id),
            new ObjectId($estandares[6]->_id),
            new ObjectId($estandares[7]->_id),
            new ObjectId($estandares[8]->_id),
            new ObjectId($estandares[9]->_id),
            new ObjectId($estandares[10]->_id),
            new ObjectId($estandares[17]->_id),
            new ObjectId($estandares[32]->_id),
            ]
        ]);
        $subcomite2=Subcomite::Create([
            'nombre'=>'Investigacion y Responsabilidad Social Universitaria',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandares[11]->_id),
                new ObjectId($estandares[21]->_id),
                new ObjectId($estandares[22]->_id),
                new ObjectId($estandares[23]->_id),
                new ObjectId($estandares[24]->_id),
                new ObjectId($estandares[25]->_id),
            ]
        ]);
        $subcomite3=Subcomite::Create([
            'nombre'=>'Seguimiento al Egresado',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandares[1]->_id),
                new ObjectId($estandares[32]->_id),
                new ObjectId($estandares[33]->_id)
                ]
        ]);
        $subcomite4=Subcomite::Create([
            'nombre'=>'Seguimiento al Estudiante y Movilidad',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandares[12]->_id),
                new ObjectId($estandares[18]->_id),
                new ObjectId($estandares[19]->_id)
            ]
        ]);
        $subcomite5=Subcomite::Create([
            'nombre'=>'Desarrollo Docente, Administrativo y Actividades Extracurriculares',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandares[13]->_id),
                new ObjectId($estandares[14]->_id),
                new ObjectId($estandares[15]->_id),
                new ObjectId($estandares[16]->_id),
                new ObjectId($estandares[20]->_id),
                new ObjectId($estandares[26]->_id)
            ]
        ]);
        $subcomite6=Subcomite::Create([
            'nombre'=>'Practicas Pre Profesionales, Recursos, Equipamiento e Infraestructura',
            'usuarios'=>[],
            'estandares'=>[
                new ObjectId($estandares[3]->_id),
                new ObjectId($estandares[27]->_id),
                new ObjectId($estandares[28]->_id),
                new ObjectId($estandares[29]->_id),
                new ObjectId($estandares[30]->_id),
                new ObjectId($estandares[31]->_id)
            ]
        ]);

        $programa=Programa::Create([
            'nombre'=>$request->programa,
            'subcomites'=>[
                new ObjectId($subcomite1->_id),
                new ObjectId($subcomite2->_id),
                new ObjectId($subcomite3->_id),
                new ObjectId($subcomite4->_id),
                new ObjectId($subcomite5->_id),
                new ObjectId($subcomite6->_id)
            ],
            'adminPrograma'=>new ObjectId($coordinador->_id)
        ]);

        return redirect()->route('usuario.home');
    }

}