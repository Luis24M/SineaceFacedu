<section class="flex justify-center items-center">
    <img width="80px" src="{{ asset('images/logoUNT.png') }}" alt="">
    <h2 class="text-3xl">FACEDU</h2>
</section>
<section class="flex flex-col jsutify-center items-center py-4 gap-3">
    <img width="180px" src="{{ asset('images/user.png') }}" alt="">
    <h2><strong>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</strong></h2>
    <h3>{{ Auth::user()->email }}</h3>
</section>
<!-- Contenedor principal -->
<ul class="flex flex-col h-1/2 py-20">
    <!-- Opción principal -->
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

    <!-- Contenedor de subcomités y usuarios -->
    <div class="mt-4 w-[250px]">
        <!-- Subcomités desplegables -->
        <div class="relative">
            <h3 class="flex items-center gap-3 cursor-pointer titulo" onclick="toggleDropdown()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-subtask">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 9l6 0" />
                    <path d="M4 5l4 0" />
                    <path d="M6 5v11a1 1 0 0 0 1 1h5" />
                    <path d="M12 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                    <path d="M12 15m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                </svg>
                Programas
                <svg id="dropdown-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="ml-auto transition-transform duration-300">
                    <path d="M6 9l6 6 6-6" />
                </svg>
            </h3>
            <ul id="dropdown-menu" class="max-h-0 pl-9 mt-2 overflow-hidden transition-[max-height] duration-300 ease-in-out">
                @foreach ($programas as $programa)
                    <li>
                        <a class="inline-block text-nowrap overflow-hidden overflow-ellipsis max-w-full">
                            {{ $programa->nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Sección de usuarios -->
        <h3 class="mt-4 flex gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
            </svg>
            Usuarios
        </h3>
        <h3 class="mt-4 flex gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
            </svg>
            <a href='#misionFacultad'>Mision de facultad</a>
        </h3>
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
<script>
    function toggleDropdown() {
        const menu = document.getElementById("dropdown-menu");
        const icon = document.getElementById("dropdown-icon");
        const titulo = document.querySelector(".titulo");

        // Alternar la clase de max-height
        if (menu.classList.contains("max-h-0")) {
            menu.classList.remove("max-h-0");
            menu.classList.add("max-h-96"); // Define un valor suficiente para el contenido
            icon.style.transform = "rotate(180deg)";
            titulo.style.fontWeight = "bold";
        } else {
            menu.classList.remove("max-h-96");
            menu.classList.add("max-h-0");
            icon.style.transform = "rotate(0deg)";
            titulo.style.fontWeight = "normal";
        }
    }
</script>
