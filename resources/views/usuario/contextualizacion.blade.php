@extends('layouts.usuario')
@section('content')
    <section class="grid min-h-screen grid-cols-12 lg:grid-cols-10">
        @include('partials.contextBar')
        <section class="w-full mt-28 col-span-9 lg:col-span-7 px-5">
            @if (request()->routeIs('estandar.narrativa'))
                @include('usuario.narrativa')
            @endif
            @if (request()->routeIs('estandar.brechas'))
                @include('usuario.brechas')
            @endif
            @if (request()->routeIs('estandar.planMejora'))
                @include('usuario.planMejora')
            @endif
            @if (request()->routeIs('estandar.index'))

                    <iframe src="{{ route('pdf', $estandar) }}" class="w-full h-[calc(100vh-120px)] border" frameborder="0"></iframe>
        </section>
        @endif
        <section id="right_sidebar"
            class="flex flex-col top-0 col-span-3 w-3/12 col-start-9 lg:col-start-7 justify-between min-h-screen fixed right-0 bg-[#D5D6E7] px-20 py-7">
            <section>
                <h2 class="text-xl font-medium">{{ $estandar->infoEstandar->titulo }}</h2>
                <p class="text-md my-3">{{ $estandar->infoEstandar->descripcion }}</p>
            </section>
            @if (request()->routeIs('estandar.planMejora'))
                @include('partials.brechasBar')
            @endif
            <section>
                <h2 class="text-xl font-medium">Evidencias</h2>
            </section>
        </section>
    </section>
@endsection
