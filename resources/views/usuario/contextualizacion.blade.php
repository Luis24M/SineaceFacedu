@extends('layouts.usuario')
@section('content')
    <section class="flex ml-[350px] min-h-screen">
        @include('partials.contextBar')
        @if (request()->routeIs('estandar.narrativa'))
            <section class="w-full mr-[500px] mt-20">
                @include('usuario.narrativa')
            </section>
        @endif
        @if (request()->routeIs('estandar.brechas'))
            <section class="w-full mr-[500px] mt-20">
                @include('usuario.brechas')
            </section>
        @endif
        @if (request()->routeIs('estandar.planMejora'))
            <section class="w-full mr-[500px] mt-20">
                @include('usuario.planMejora')
            </section>
        @endif
        @if (request()->routeIs('estandar.index'))
            <section class="mr-[500px] pl-5 py-24 w-full h-full">
                <div class="contenedor_doc flex justify-center items-center ">
                    <!-- Contenido original (oculto) -->
                    <div id="contenido-original" style="display: none;">
                        <h3 class="pt-2"><strong>Programa de estudios: </strong>{{ Auth::user()->program }}</h3>
                        <h3><strong>Fecha de actualización: </strong>{{ date('d / m / Y') }}</h3>
                        <!-- Aquí irá el contenido dinámico -->
                        <br>
                        <table
                            class="w-full [&>tbody>tr]:w-full border-collapse border-[0.1px] border-slate-600 [&>tbody>tr>td]:border-[0.1px]  [&>tbody>tr>td]:border-slate-600">
                            <thead>
                                <tr class="bg-[#002060] text-white">
                                    <td class="p-2">MODELO DE ACREDITACIÓN SINEACE-2016</td>
                                </tr>
                            </thead>
                            <tbody class="[&>tr>td]:p-2">
                                <tr class="flex justify-between [&>td]:text-center [&>td]:grow">
                                    <td>{{ $estandar->dimension }}</td>
                                    <td>{{ $estandar->factor }}</td>
                                    <td>{{ $estandar->titulo }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>
                                            {{ $estandar->titulo }}
                                        </strong>
                                        <p>{{ $estandar->descripcion }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2><strong>1. Redacción de la contextualización</strong></h2>
                                        <div class="px-4 py-2">
                                            {!! $narrativa->misionUNT !!}
                                            {!! $narrativa->misionFacultad !!}
                                            {!! $narrativa->misionPrograma !!}
                                            @foreach ($problematicas as $problematica)
                                                <p>{{ $problematica->description }}</p> <br>
                                            @endforEach
                                        </div>
                                        <h2><strong>2. Brechas (dificultades encontradas)</strong></h2>
                                        <ul class="py-3 px-7">
                                            @foreach ($problematicas as $problematica)
                                                <li class="list-disc">{{ $problematica->nombre }}</li>
                                            @endforEach
                                        </ul>
                                        <h2><strong>3. Plan de mejora (indicar si la acción de mejora se podrá elaborar a
                                                corto,
                                                mediano o largo plazo)</strong></h2>
                                    </td>
                                </tr>
                        </table>
                        </tbody>
                    </div>
                    <!-- Contenedor de páginas -->
                    <div id="documento"></div>

                    <!-- Controles de zoom -->
                    <div class="zoom-controls">
                        <button onclick="zoomIn()" class="px-3 py-1 bg-gray-200 rounded mr-2">+</button>
                        <button onclick="zoomOut()" class="px-3 py-1 bg-gray-200 rounded mr-2">-</button>
                        <button onclick="resetZoom()" class="px-3 py-1 bg-gray-200 rounded">Reset</button>
                    </div>
                </div>
                {{-- @include('partials.pdf')
                <a class="px-4 py-2 bg-green-500" href="{{ route('pdf')}}">Descargar pdf</a> --}}
            </section> 
        @endif
        <section id="right_sidebar"
            class="w-[500px] flex flex-col justify-between min-h-screen fixed right-0 bg-[#D5D6E7] px-20 py-7">
            <section>
                <h2 class="text-xl font-medium">{{ $estandar->titulo }}</h2>
                <p class="text-md my-3">{{ $estandar->descripcion }}</p>
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
