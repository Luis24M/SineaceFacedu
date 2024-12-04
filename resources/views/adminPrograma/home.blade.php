@extends('layouts.adminPrograma')

@section('content')
    <div>
        <div class="pl-4 my-4">
            <h1 class="text-5xl text-neutral-600">Buen día <strong>{{ Auth::user()->name }}</strong></h1>
        </div>
        <div class="bg-neutral-200 p-4 rounded-xl space-y-3">
            <h1 class="text-2xl font-bold">Mis Subcomites</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($subcomites as $subcomite)
                <div class="p-4 bg-white rounded-lg shadow">
                    <h2 class="text-2xl font-semibold text-neutral-700">{{ $subcomite->nombre }}</h2>
                    <div class="mt-2 text-neutral-600">
                        <p class="font-bold">Estándares:</p>
                        <div class="space-x-1">
                            @foreach ($subcomite->estandares->pluck('infoEstandar.indice')->take(5) as $indice)
                                <span class="inline-block bg-neutral-100 rounded px-2 py-1 text-xs">{{ $indice }}</span>
                            @endforeach
                            @if ($subcomite->estandares->count() > 5)
                                <span class="text-xs text-neutral-500">(+{{ $subcomite->estandares->count() - 5 }})</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection