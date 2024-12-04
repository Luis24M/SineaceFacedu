@extends('layouts.adminPrograma')

@section('content')
    <div>
        <div class="pl-4 my-4">
            <h1 class="text-5xl text-neutral-600 ">Buen día <strong>{{ Auth::user()->name }}</strong></h1>
        </div>
        <div class="h-1/4">
            <h1 class="text-2xl font-bold">Mis Subcomites</h1>
            @foreach ($programa->subcomites as $subcomite)
    <div class="p-4 mb-4 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-semibold text-neutral-700">{{ $subcomite['nombre'] }}</h2>
        <ul class="mt-2 pl-4 list-disc text-neutral-600">
            @foreach ($subcomite['estandares'] as $estandar)
                <li>
                    <p><strong>{{ $estandar['infoEstandar']['titulo'] }}</strong></p>
                </li>
            @endforeach
        </ul>
    </div>
@endforeach

        </div>
    </div>
@endsection
