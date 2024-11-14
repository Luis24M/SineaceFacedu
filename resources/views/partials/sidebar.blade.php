{{-- usuario: nombre, apellidoPa, apellidoMa, correo | usuario.subcomite: estandares | usuario.subcomite.estandar.criterio: evidencias --}}

<section class="flex justify-center items-center">
    <img width="80px" src="{{ asset('images/logoUNT.png') }}" alt="">
    <h2 class="text-3xl">FACEDU</h2>
</section>
<section class="flex flex-col jsutify-center items-center py-4 gap-3">
    <img width="180px" src="{{ asset('images/user.png') }}" alt="">
    <h2><strong>{{ $nombre }} {{ $apellidoPa }} {{ $apellidoMa }}</strong></h2>
    <h3>{{ $correo }}</h3>
</section>

<ul class="flex flex-col justify-center h-1/2 py-4">
    <li class="flex justify-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
            <path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
            <path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
            <path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
        </svg>
        <a href="{{ route('usuario.home', $usuario) }}">Main</a>
    </li>
    {{-- <ul>
    @foreach ($estandares as $estandar)
      <li><a href="{{ route('usuario.estandar', $estandar->id) }}">{{ $estandar->nombre }}</a></li>
  </ul>
  <ul>
    @foreach ($evidencias as $evidencia)
      <li><a href="{{ route('usuario.evidencia', $evidencia->id) }}">{{ $evidencia->nombre }}</a></li>
  </ul> --}}
</ul>
