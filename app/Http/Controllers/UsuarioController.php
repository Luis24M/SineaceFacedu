<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //login en mongodb con laravel ver si obtiene los datos
    public function login(Request $request)
    {
        try {
            $data = $request->all();
            $usuario = Usuario::where('correo', $data['correo'])->first();

            if ($usuario) {
                if ($usuario->contrasena == $data['contrasena']) {
                    return redirect()->route('usuario.home', ['usuario' => $usuario]);
                } else {
                    return response()->json(['message' => 'Contraseña incorrecta']);
                }
            } else {
                return response()->json(['message' => 'Usuario no encontrado']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al iniciar sesión']);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Usuario $usuario)
    {
        //{{-- usuario: nombre, apellidoPa, apellidoMa, correo | usuario.subcomite: estandares | usuario.subcomite.estandar.criterio: evidencias--}}

        $nombre = $usuario->nombre;
        $apellidoPa = $usuario->apellidoPa;
        $apellidoMa = $usuario->apellidoMa;
        $correo = $usuario->correo;
        // mostrar los datos de la base de datos en la consola
        // $subcomite = $usuario->subcomite;
        // $estandares = $subcomite->estandares;
        // $criterios = $estandares->criterios;
        // $evidencias = $criterios->evidencias;
         
        return view('usuario.home', compact('usuario', 'nombre', 'apellidoPa', 'apellidoMa', 'correo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $usuario = new Usuario();
        $usuario->fill($data);
        $usuario->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
