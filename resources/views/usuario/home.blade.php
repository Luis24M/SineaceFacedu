@extends('layouts.usuario')
<section>
        <div class="pl-2 my-4 ml-[400px]">
            <h1 class="text-5xl text-neutral-600">Bienvenido <strong>{{ Auth::user()->name }}</strong></h1>
        </div>
        <div class="bg-neutral-200 p-4 rounded-xl space-y-3 ml-[400px] w-full">
            <h1 class="text-2xl font-bold">Estandares</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($estandares as $estandar)
                <div class="p-4 bg-white rounded-lg shadow flex flex-col justify-between">
                    <h2 class="text-2xl font-semibold text-neutral-700">{{ $estandar->infoEstandar->titulo }}</h2>
                    <div class="flex flex-col gap-3">
                        <div class="mt-2 text-neutral-600">
                            <p class="font-medium text-neutral-500">Informacion:</p>
                        </div>
                        <a href="{{ route('subcomite.show', $subcomite->id) }}" class="px-2 py-1 bg-blue-500 rounded-lg shadow-md text-center">Entrar</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>
@section('content')
@endsection