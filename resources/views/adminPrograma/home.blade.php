@extends('layouts.adminPrograma')

@section('content')
    <section>
        <div class="pl-2 my-4">
            <h1 class="text-5xl text-neutral-600">Bienvenido <strong>{{ Auth::user()->name }}</strong></h1>
        </div>
        <div class="bg-neutral-200 p-4 rounded-xl space-y-3">
            <h1 class="text-2xl font-bold">Subcomites</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($subcomites as $subcomite)
                <div class="p-4 bg-white rounded-lg shadow flex flex-col justify-between">
                    <h2 class="text-2xl font-semibold text-neutral-700">{{ $subcomite->nombre }}</h2>
                    <div class="flex flex-col gap-3">
                        <div class="mt-2 text-neutral-600">
                            <p class="font-medium text-neutral-500">Estándares:</p>
                            <div class="space-x-1">
                                @foreach ($subcomite->estandares->pluck('infoEstandar.indice')->take(5) as $indice)
                                <span class="inline-block bg-neutral-100 rounded px-2 py-1 text-xs">{{ $indice }}</span>
                                @endforeach
                                @if ($subcomite->estandares->count() > 5)
                                <span class="text-xs text-neutral-500">(+{{ $subcomite->estandares->count() - 5 }})</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('subcomite.show', $subcomite->id) }}" class="px-2 py-1 bg-blue-500 rounded-lg shadow-md text-center">Entrar</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <br>
        <div class="mt-5 flex flex-col bg-neutral-200 drop-shadow-md p-4 rounded-xl gap-4">
        <h1 class="text-3xl font-medium" id="misionFacultad">Mision de Programa</h1>
        <p>¿Desea modificar la misión institucional?</p>
        <form method="post" action="{{route('home.asignarMisionUNT')}}">
        @csrf
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Mision de Programa</label>
            <textarea id="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 
            rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
             placeholder="Ingrese sus ideas" rows=5 name="mision">{{$narrativa->misionPrograma ? $narrativa->misionPrograma : 'No hay Mision de Programa actualmente' }}</textarea>
    
            <!-- Contenedor del botón alineado a la derecha -->
            <div class="flex justify-end mt-3">
                <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Guardar
                </button>
            </div>
        </form>
    </div>
    </br>
        {{-- Usuarios Tabla dinamica para eliminar, actulizar o agregar --}}
        <section class="bg-neutral-200 p-4 rounded-xl">
            <div class="flex justify-between pr-5">
                <h1 class="text-2xl font-bold">Usuarios</h1>
            </div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left">Nombre</th>
                        <th class="text-left">Correo</th>
                        <th class="text-left">DNI</th>
                        <th class="text-left">Subcomite</th>
                        <th class="text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }} {{ $usuario->lastname }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->dni }}</td>
                        <td>{{ $usuario->subcomite->nombre }}</td>
                        <td>
                            <button class="bg-blue-500 text-white px-2 py-1 rounded-lg" onclick="modal()">Editar</button>
                            <form action="{{ route('usuario.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-lg" 
                                        onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="bg-green-500 text-white px-2 py-1 rounded-lg" onclick="modalAgregar()">Agregar</button>

        </section>
        
    </section>    

    {{-- modal formulario para agregar usuario --}}
    @include('partials.formUsuario')

    <script>
        function modal() {
            const modal = document.getElementById('modal');
            modal.classList.toggle('hidden');
        }

        function modalAgregar() {
            const modal = document.getElementById('modal');
            modal.classList.toggle('hidden');
            // limpiar form
            
        }
    </script>
@endsection 