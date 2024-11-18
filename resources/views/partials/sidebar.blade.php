{{-- usuario: nombre, apellidoPa, apellidoMa, correo |
 usuario.subcomite: estandares | 
 usuario.subcomite.estandar.criterio: evidencias --}}

<section class="flex justify-center items-center">
    <img width="80px" src="{{ asset('images/logoUNT.png') }}" alt="">
    <h2 class="text-3xl">FACEDU</h2>
</section>
<section class="flex flex-col jsutify-center items-center py-4 gap-3">
    <img width="180px" src="{{ asset('images/user.png') }}" alt="">
    <h2><strong>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</strong></h2>
    <h3>{{ Auth::user()->email }}</h3>
</section>

<ul class="flex flex-col h-1/2 py-20">
    <li class="flex gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
            <path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
            <path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
            <path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
        </svg>
        <a href="{{ route('usuario.home') }}">Main</a>
    </li>
    {{-- mostrar estandares atraves de subcommittee, subcommittee solo es el nombre tendria que buscarse los estandares en los documents de Subcomite --}}
    <h2 class="text-xl mt-6 text-center">Estandares</h2>
    <hr class="w-full">
    <div class=mt-4>
        @foreach ($subcomite->estandares as $estandar)
            <a href="{{ route('estandar.index', $estandar)}}" class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-text-caption">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 15h16" />
                    <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                    <path d="M4 20h12" />
                </svg>
                Estandar {{ $estandar }}
            </a>
        @endforeach
    </div>


</ul>
<div class="order-last">
    <a class="dropdown-item flex hover:font-bold" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
        </svg>
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
