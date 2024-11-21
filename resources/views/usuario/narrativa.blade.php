<div class="my-5 contenedor_doc flex justify-center items-center">
  <div class="documento">
    <div class="page">
      <form action="{{ route('estandar.actualizarNarrativa', $estandar->nombre)}}" method="POST">
        @csrf
        <div id="toolbar">
          <!-- Copiar el toolbar del ejemplo anterior -->
        </div>
        <div id="editor"></div>
        <input type="hidden" name="narrativa" id="hiddenContent">
        <button type="submit" class="py-2 px-4 bg-green-500 rounded-lg mt-4">Guardar</button>
      </form>
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
    const options = {
      placeholder: 'Escribe aquí...',
      theme: 'snow'
    }
    const quill = new Quill('#editor', options);

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

</div>