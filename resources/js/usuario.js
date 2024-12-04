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
