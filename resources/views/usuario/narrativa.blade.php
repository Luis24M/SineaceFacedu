<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<div class="my-3 contenedor_doc flex justify-center items-center">
    <div class="documento">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="page flex flex-col gap-4 [&>div>h3]:text-xl [&>div>h3]:font-semibold">
            <div>
                <h3>UNT</h3>
                <br>
                @if($narrativa->misionUNT)
                    <p>{{ $narrativa->misionUNT }}</p>
                @else
                    <p class="rounded-md px-3 py-2 w-full bg-yellow-100 border border-yellow-300">
                        No se ha registrado la misión de la UNT
                    </p>
                @endif
            </div>
            <div>
                <h3>FACULTAD</h3>
                <br>
                @if($narrativa->misionFacultad)
                    <p>{{ $narrativa->misionFacultad }}</p>
                @else
                    <p class="rounded-md px-3 py-2 w-full bg-yellow-100 border border-yellow-300">
                        No se ha registrado la misión de la Facultad
                    </p>
                @endif
            </div>
            <div>
                <h3>PROGRAMA</h3>
                <form action={{ route('estandar.actualizarNarrativaPrograma', $estandar) }} method="POST">
                    @csrf
                    <div id="toolbar">

                    </div>

                    <div id="editor1" class="">{!! $narrativa->misionPrograma !!}</div>
                    <input type="hidden" name="programa" id="hiddenContentPrograma">
                    <button id="content" class="py-2 px-4 bg-green-500 rounded-lg mt-2"
                        onclick="verPrograma()">Guardar</button>
                    <button>Agregar Problematica</button>
                </form>
            </div>
            {{-- <div>
                <h3>DESCRIPCIÓN</h3>
                <form action={{ route('estandar.actualizarNarrativaDescripcion', $estandar->nombre) }} method="POST">
                    @csrf
                    <div id="toolbar">
                    </div>
                    <div id="editor2" class="min-h-[200px]">{{ $contextualizacion->narrativa['descripcion'] }}</div>
                    <input type="hidden" name="descripcion" id="hiddenContentDescripcion">
                    <button id="content" class="py-2 px-4 bg-green-500 rounded-lg mt-2"
                        onclick="ver()">Guardar</button>
                </form>
            </div> --}}
        </div>
        <!-- Controles de zoom -->
        <div class="zoom-controls">
            <button onclick="zoomIn()" class="px-3 py-1 bg-gray-200 rounded mr-2">+</button>
            <button onclick="zoomOut()" class="px-3 py-1 bg-gray-200 rounded mr-2">-</button>
            <button onclick="resetZoom()" class="px-3 py-1 bg-gray-200 rounded">Reset</button>
        </div>

    </div>

    <!-- Initialize Quill editor -->
    <script>
        var quill1 = new Quill('#editor1', {
            theme: 'snow'
        });

        var quill2 = new Quill('#editor2', {
            theme: 'snow'
        });

        function verPrograma() {
            var content = document.querySelector('#hiddenContentPrograma');
            content.value = quill1.root.innerHTML;
            console.log(content);
        }

        function ver() {
            var content = document.querySelector('#hiddenContentDescripcion');
            content.value = quill2.getText();
            console.log(content);
        }

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

        // Reajustar al cambiar el tamaño de la ventana
        window.addEventListener('resize', () => {
            distribuirContenido();
            updatePreviews();
        });
    </script>

</div>
