@extends('layouts.usuario')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
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
            <section class="mr-[500px] w-full h-full">

                <div class="contenedor_doc flex justify-center items-center py-24">
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
                                        <h2><strong>3. Plan de mejora (indicar si la acción de mejora se podrá elaborar a corto,
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

                    <!-- Navegación de páginas -->
                    <div class="page-navigation">
                        <button onclick="prevPage()" class="px-3 py-1 bg-gray-200 rounded mr-2">←</button>
                        <span id="page-counter">Página 1 de 1</span>
                        <button onclick="nextPage()" class="px-3 py-1 bg-gray-200 rounded ml-2">→</button>
                    </div>

                    <!-- Previsualización de páginas -->
                    {{-- <div class="page-preview">
                    <div id="preview-container"></div>
                </div> --}}
                </div>
                <section class="pb-20 mx-20">
                    <button onclick="exportToPDF()" class="px-4 py-2 bg-blue-500 text-white rounded mb-2 w-full">
                        Exportar a PDF
                    </button>
                    <button onclick="print()" class="px-4 py-2 bg-green-500 text-white rounded w-full">
                        Imprimir
                    </button>
                </section>
            </section>
        @endif
        <section id="right_sidebar" class="w-[500px] flex flex-col justify-between min-h-screen fixed right-0 bg-[#D5D6E7] px-20 py-7">
            <section>
                <h2 class="text-xl font-medium">{{ $estandar->titulo }}</h2>
                <p class="text-md my-3">{{ $estandar->descripcion }}</p>
            </section>
            @if(request()->routeIs('estandar.planMejora'))
                @include('partials.brechasBar')
            @endif
            <section>
                <h2 class="text-xl font-medium">Evidencias</h2>
            </section>
        </section>
    </section>

    <script>
        let currentZoom = 1;
        let currentPage = 1;
        let totalPages = 1;

        // Inicialización
        document.addEventListener('DOMContentLoaded', function() {
            distribuirContenido();
            updatePreviews();
        });

        function distribuirContenido() {
            const contenido = document.getElementById('documento');
            const contenidoOriginal = document.getElementById('contenido-original');
            const altoPagina = 1123; // Alto A4 en píxeles
            const altoHeader = 100;
            const contenidoUtil = altoPagina - altoHeader;

            contenido.innerHTML = '';
            let paginaActual = crearPagina();
            contenido.appendChild(paginaActual);

            const contentDiv = paginaActual.querySelector('.content');
            Array.from(contenidoOriginal.childNodes).forEach(nodo => {
                const clon = nodo.cloneNode(true);
                contentDiv.appendChild(clon);

                if (contentDiv.offsetHeight > contenidoUtil) {
                    contentDiv.removeChild(clon);
                    paginaActual = crearPagina();
                    contenido.appendChild(paginaActual);
                    paginaActual.querySelector('.content').appendChild(clon);
                }
            });

            totalPages = document.querySelectorAll('.page').length;
            updatePageCounter();
        }

        function crearPagina() {
            const pagina = document.createElement('div');
            pagina.className = 'page';

            const header = document.createElement('div');
            header.className = 'page-header';
            header.innerHTML = `
            <div class="relative flex justify-center items-center h-16">
              <img src="{{ asset('images/logoUNTletras.png') }}" alt="Logo" class="absolute left-0 h-16 h-full">
              <div class="text-center w-[380px]">
                  <h1 class="text-lg font-bold">UNIVERSIDAD NACIONAL DE TRUJILLO</h1>
                  <p class="text-sm font-semibold">OFICINA DE GESTIÓN DE LA CALIDAD </p>
                  <p class="text-sm font-semibold">UNIDAD DE ACREDITACIÓN Y LICENCIAMIENTO</p>
              </div>
            </div>`;
            // <p>${new Date().toLocaleDateString()}</p>


            const content = document.createElement('div');
            content.className = 'content';

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
            document.querySelectorAll('.page').forEach(page => {
                page.style.transform = `scale(${currentZoom})`;
                page.style.transformOrigin = 'top center';
            });
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                updatePageCounter();
                scrollToPage(currentPage);
            }
        }

        function nextPage() {
            if (currentPage < totalPages) {
                currentPage++;
                updatePageCounter();
                scrollToPage(currentPage);
            }
        }

        function updatePageCounter() {
            document.getElementById('page-counter').textContent = `Página ${currentPage} de ${totalPages}`;
        }

        function scrollToPage(pageNum) {
            const pages = document.querySelectorAll('.page');
            if (pages[pageNum - 1]) {
                pages[pageNum - 1].scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }

        function updatePreviews() {
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = '';

            document.querySelectorAll('.page').forEach((page, index) => {
                const preview = document.createElement('div');
                preview.className = `preview-thumbnail ${index + 1 === currentPage ? 'active' : ''}`;
                preview.innerHTML = `<div class="text-center text-xs">Página ${index + 1}</div>`;
                preview.onclick = () => {
                    currentPage = index + 1;
                    updatePageCounter();
                    scrollToPage(currentPage);
                    updatePreviews();
                };
                previewContainer.appendChild(preview);
            });
        }

        async function exportToPDF() {
            const element = document.getElementById('documento');
            const opt = {
                margin: 1,
                filename: 'documento.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            try {
                await html2pdf().set(opt).from(element).save();
            } catch (error) {
                console.error('Error al exportar a PDF:', error);
                alert('Error al exportar a PDF. Por favor, intente nuevamente.');
            }
        }

        // Observer para cambios en el contenido
        const observer = new MutationObserver(() => {
            distribuirContenido();
            updatePreviews();
        });

        observer.observe(document.getElementById('contenido-original'), {
            childList: true,
            subtree: true,
            characterData: true
        });

        // Reajustar al cambiar el tamaño de la ventana
        window.addEventListener('resize', () => {
            distribuirContenido();
            updatePreviews();
        });
    </script>
@endsection
