<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>FACEDU - SINEACE</title>
</head>

<body class="h-full grid grid-cols-12">
    <!-- Botón para mostrar el sidebar -->
    <button id="toggleSidebar" class="fixed top-1/2 left-0 bg-[#73767a97] text-white rounded-r-md p-2 z-50 lg:hidden transform transition-transform duration-300">
        <!-- Icono del botón -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-compact-right"
            id="arrow">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M11 4l3 8l-3 8" />
        </svg>
    </button>

    <!-- Barra lateral -->
    <nav class="px-10 py-5 bg-[#D5D6E7] h-screen min-w-[250px] lg:w-2/12 fixed top-0 left-0 z-40 flex flex-col items-center transform -translate-x-full transition-transform duration-300 lg:translate-x-0 "
        id="sidebar">
        @include('partials.sidebarAdminPrograma')
    </nav>

    <!-- Contenido principal -->
    <main class="col-span-12 lg:col-start-3 lg:col-span-10 ml-auto w-full flex flex-col p-5">
        @yield('content')
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const arrow = document.getElementById('arrow');

        toggleSidebar.addEventListener('click', () => {
            // Alternar clases para mostrar u ocultar el sidebar
            if (sidebar.classList.contains('-translate-x-full')) {
                arrow.classList.add('rotate-180');
                toggleSidebar.classList.add('translate-x-[330px]');
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            } else {
                arrow.classList.remove('rotate-180');
                toggleSidebar.classList.remove('translate-x-[330px]');
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>

</html>
