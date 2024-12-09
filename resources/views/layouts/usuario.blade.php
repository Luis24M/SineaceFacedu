<!DOCTYPE html>
<html lang="es" class="w-full flex">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>FACEDU - SINEACE</title>
</head>

<body class="flex w-full ">
    <nav class="w-[350px] px-10 py-5 bg-[#D5D6E7] fixed h-screen flex flex-col items-center">
        <section class="flex justify-center items-center">
            <img width="80px" src="{{ asset('images/logoUNT.png') }}" alt="">
            <h2 class="text-3xl">FACEDU</h2>
        </section>
        <section class="flex flex-col jsutify-center items-center py-4 gap-3">
            <img width="180px" src="{{ asset('images/user.png') }}" alt="">
            <h2><strong>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</strong></h2>
            <h3>{{ Auth::user()->email }}</h3>
        </section>
        <!--SIDEBARA OPTIONS-->
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
            @include('partials.sidebar')
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
    </nav>

    <main class="col-span-12 lg:col-start-3 lg:col-span-10 ml-auto w-full flex flex-col p-5">
        @if (session('success'))
            <div id="success-notification"
                class="absolute z-20 right-0 bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
            <script>
                setTimeout(() => {
                    const notification = document.getElementById('success-notification');
                    if (notification) {
                        notification.style.transition = 'opacity 0.5s ease';
                        notification.style.opacity = '0';
                        setTimeout(() => notification.remove(), 500);
                    }
                }, 1000);
            </script>
        @endif
        @yield('content')
    </main>
</body>
<script>
    function verPrograma() {
  var content = document.querySelector('#hiddenContentPrograma');
  content.value = quill1.root.innerHTML;
  console.log(content);
}

function problematica() {
  var modal = document.getElementById('modal');
  var span = document.getElementById('close');
  modal.style.display = 'block';
  span.onclick = function() {
      modal.style.display = 'none';
  }
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = 'none';
      }
  }
}

let currentZoom = 1;
let currentPage = 1;
let totalPages = 1;

document.addEventListener("DOMContentLoaded", function () {
    distribuirContenido();
});

function distribuirContenido() {
    const contenido = document.getElementById("documento");
    const contenidoOriginal = document.getElementById("contenido-original");
    const altoPagina = 1123; // Alto A4 en píxeles
    const altoHeader = 100;
    const contenidoUtil = altoPagina - altoHeader;

    contenido.innerHTML = "";
    let paginaActual = crearPagina();
    contenido.appendChild(paginaActual);

    const contentDiv = paginaActual.querySelector(".content");
    Array.from(contenidoOriginal.childNodes).forEach((nodo) => {
        const clon = nodo.cloneNode(true);
        contentDiv.appendChild(clon);

        if (contentDiv.offsetHeight > contenidoUtil) {
            contentDiv.removeChild(clon);
            paginaActual = crearPagina();
            contenido.appendChild(paginaActual);
            paginaActual.querySelector(".content").appendChild(clon);
        }
    });

    totalPages = document.querySelectorAll(".page").length;
}

function crearPagina() {
    const pagina = document.createElement("div");
    pagina.className = "page";

    const header = document.createElement("div");
    header.className = "page-header";
    header.innerHTML = `
            <div class="relative flex justify-center items-center h-16">
              <img src="../images/logoUNTletras.png" alt="Logo" class="absolute left-0 h-16 h-full">
              <div class="text-center w-[380px]">
                  <h1 class="text-lg font-bold">UNIVERSIDAD NACIONAL DE TRUJILLO</h1>
                  <p class="text-sm font-semibold">OFICINA DE GESTIÓN DE LA CALIDAD </p>
                  <p class="text-sm font-semibold">UNIDAD DE ACREDITACIÓN Y LICENCIAMIENTO</p>
              </div>
            </div>`;

    const content = document.createElement("div");
    content.className = "content";

    pagina.appendChild(header);
    pagina.appendChild(content);
    return pagina;
}

function zoomIn() {
    currentZoom += 0.1;
    applyZoom();
}

function zoomOut() {
    currentZoom -= 0.1;
    applyZoom();
}

function resetZoom() {
    currentZoom = 1;
    applyZoom();
}

function applyZoom() {
    document.querySelectorAll(".page").forEach((page) => {
        page.style.transform = `scale(${currentZoom})`;
        page.style.transformOrigin = "top center";
    });
}

window.addEventListener("resize", () => {
    distribuirContenido();
});

</script>
</html>
