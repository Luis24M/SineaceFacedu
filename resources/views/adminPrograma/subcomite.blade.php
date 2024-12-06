@extends('layouts.adminPrograma')

@section('content')
<h1 class="text-3xl text-neutral-500">Subcomite de <strong class="text-neutral-700">{{ $subcomite->nombre }}</strong></h1>
<br>
<section class=" bg-orange-50 p-3 rounded-xl">
    <h2 class="text-xl font-medium mb-3">Estandares</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($subcomite->estandares as $estandar)
        <div class="p-4 bg-white rounded-lg shadow flex flex-col justify-between">
            <h2 class="text-2xl font-semibold text-neutral-700">{{ $estandar->infoEstandar->indice }}. {{$estandar->infoEstandar->titulo}}</h2>
            <div class="flex flex-col gap-3">
                <div class="mt-2 text-neutral-600">
                    <p class="font-medium text-neutral-500">Criterios:</p>
                    <div class="space-x-1">
                        {{-- @foreach ($estandar->criterios->pluck('infoCriterio.indice')->take(5) as $indice)
                        <span class="inline-block bg-neutral-100 rounded px-2 py-1 text-xs">{{ $indice }}</span>
                        @endforeach
                        @if ($estandar->criterios->count() > 5)
                        <span class="text-xs text-neutral-500">(+{{ $estandar->criterios->count() - 5 }})</span>
                        @endif --}}
                    </div>
                </div>
                <a href="" class="px-2 py-1 bg-blue-500 rounded-lg shadow-md text-center">Entrar</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
<br>
{{-- tabla de usuarios --}}
<section class="bg-orange-50 p-3 rounded-xl">
    <h2 class="text-xl font-medium mb-3">Usuarios</h2>
    <table class="w-full">
        <thead>
            <tr>
                <th class="text-left">Nombre</th>
                <th class="text-left">Correo</th>
                <th class="text-left">DNI</th>
                <th class="text-left">Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcomite->usuarios as $usuario)
            <tr>
                <td>{{ $usuario->name }} {{ $usuario->lastname }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->dni }}</td>
                <td>{{ $usuario->rol }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection