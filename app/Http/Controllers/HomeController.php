<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subcomite;
use App\Models\Contextualizacion;
use App\Models\Narrativa;
use App\Models\InfoEstandar;
use App\Models\Estandar;
use App\Models\Programa;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
        $subcomite = Auth::user()->subcomite;
        $estandares = $subcomite->estandares()->with('infoEstandar')->get();
        return view('usuario.home', compact('subcomite','estandares'));
    }

    public function adminPrograma()
    {
        $cacheKey = 'programa_' . Auth::user()->programa . '_' . Auth::id();
        
        $programa=Auth::user()->programa;
        $subcomites = $programa->subcomites;
        $usuarios = $subcomites->pluck('usuarios')->flatten(); // Todos los usuarios de los subcomites del programa, pluck para obtener solo los usuarios de cada subcomite y flatten para aplanar el array de arrays
        return view('adminPrograma.home', compact('programa', 'subcomites','usuarios'));
    }


    public function admin()
    {   
        $programas = Programa::with('adminPrograma')->get();
        $narrativa = Narrativa::first();
        return view('administrador.home',compact('programas','narrativa'));
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
    public function CrearPrograma(Request $request)
    {
        // Aumentar tiempo de ejecución si es necesario
        set_time_limit(120);
    
        // Iniciar transacción de base de datos
        DB::beginTransaction();
    
        try {
            // Validación de datos
            $validateData = $request->validate([
                'programa' => 'unique:programas,nombre',
                'dni' => 'unique:users,dni',
                'nombre' => 'required',
                'apellido' => 'required',
                'email' => 'required|email',
            ]);
    
            // Obtener todos los InfoEstandares de una vez
            $infoestandares = InfoEstandar::all();
    
            // Crear estandares en lote
            $estandares = $infoestandares->map(function($infoestandar) {
                $contextualizacion = Contextualizacion::create();
                $narrativa = Narrativa::create();
                
                $estandar = Estandar::create();
                $estandar->contextualizacion()->save($contextualizacion);
                $contextualizacion->narrativa()->save($narrativa);
                $infoestandar->estandares()->save($estandar);
                
                return $estandar;
            });
    
            // Crear coordinador
            $coordinador = User::create([
                'name' => $request->nombre,
                'lastname' => $request->apellido,
                'email' => $request->email,
                'dni' => $validateData['dni'],
                'password' => bcrypt($request->dni), // Usar bcrypt para hashear contraseña
                'rol' => 'adminPrograma',
            ]);
    
            // Definición de subcomités con mapeo de estándares optimizado
            $subcomitesData = [
                ['nombre' => 'Gestión Misional del Programa', 'estandares' => [0, 2, 4, 5, 6, 7, 8, 9, 10, 17, 32]],
                ['nombre' => 'Investigación y Responsabilidad Social Universitaria', 'estandares' => [11, 21, 22, 23, 24, 25]],
                ['nombre' => 'Seguimiento al Egresado', 'estandares' => [1, 32, 33]],
                ['nombre' => 'Seguimiento al Estudiante y Movilidad', 'estandares' => [12, 18, 19]],
                ['nombre' => 'Desarrollo Docente, Administrativo y Actividades Extracurriculares', 'estandares' => [13, 14, 15, 16, 20, 26]],
                ['nombre' => 'Prácticas Pre Profesionales, Recursos, Equipamiento e Infraestructura', 'estandares' => [3, 27, 28, 29, 30, 31]],
            ];
    
            // Crear subcomités en lote
            $subcomites = collect($subcomitesData)->map(function ($data) use ($estandares) {
                $subcomite = Subcomite::create(['nombre' => $data['nombre']]);
                
                // Filtrar solo los estándares existentes
                $subcomiteEstandares = collect($data['estandares'])
                    ->map(fn($index) => $estandares[$index] ?? null)
                    ->filter();
                
                $subcomite->estandares()->saveMany($subcomiteEstandares);
                return $subcomite;
            });
    
            // Crear programa
            $programa = Programa::create([
                'nombre' => $validateData['programa'],
            ]);
    
            // Asociar relaciones
            $programa->adminPrograma()->save($coordinador);
            $programa->subcomites()->saveMany($subcomites);
    
            // Commit de la transacción
            DB::commit();
    
            // Redirección
            return redirect()->route('usuario.home')->with('success', 'Programa creado exitosamente');
    
        } catch (\Exception $e) {
            // Rollback en caso de error
            DB::rollBack();
    
            // Log del error
            \Log::error('Error al crear programa: ' . $e->getMessage());
    
            // Redirección con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al crear el programa');
        }
    }

    public function AsignarMisionUNT(Request $request){
        try {
            $narrativas = Narrativa::all();
            foreach($narrativas as $narrativa){
                $narrativa->misionUNT = $request->mision;
                $narrativa->save();
            }
    
            return redirect()->route('usuario.home')->with('success', 'Misión actualizada');
        } catch (\Exception $e) {
            // Esto te ayudará a ver el error exacto
            return back()->with('error', $e->getMessage());
        }
    }
    

    public function AsignarMisionFacultad(Request $request){
        try {
            $narrativas = Narrativa::all();
            foreach($narrativas as $narrativa){
                $narrativa->misionFacultad = $request->mision;
                $narrativa->save();
            }
    
            return redirect()->route('usuario.home')->with('success', 'Misión actualizada');
        } catch (\Exception $e) {
            // Esto te ayudará a ver el error exacto
            return back()->with('error', $e->getMessage());
        }
    }


    public function CrearUsuario(Request $request, Programa $programa){
    
        $usuario = User::Create([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'dni'=>$request->dni,
            'password'=>$request->dni,
            'rol'=>'user',
        ]);
        $subcomite = Subcomite::where('id',$request->subcomite)->first();
        $subcomite->usuarios()->save($usuario);
        return redirect()->route('usuario.home');
    }

    public function usuarios()
    {
        $usuarios = User::all();
        return view('adminPrograma.usuarios',compact('usuarios'));
    }
}