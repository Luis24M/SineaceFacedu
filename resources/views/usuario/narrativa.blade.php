<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<div class="my-3 contenedor_doc flex justify-center items-center">
    <div class="documento">
        <div class="page flex flex-col gap-4 [&>div>h3]:text-xl [&>div>h3]:font-semibold">
            <div>
                <h3>INSTITUCIONAL</h3>
                <br>
                @if ($narrativa->misionUNT)
                    <p>{{ $narrativa->misionUNT }}</p>
                @else
                    <p class="rounded-md px-3 py-2 w-full bg-yellow-100 border border-yellow-300">
                        No se ha registrado la misión de la Institucional
                    </p>
                @endif
            </div>
            <div>
                <h3>FACULTAD</h3>
                <br>
                @if ($narrativa->misionFacultad)
                    <p>{{ $narrativa->misionFacultad }}</p>
                @else
                    <p class="rounded-md px-3 py-2 w-full bg-yellow-100 border border-yellow-300">
                        No se ha registrado la misión de la Facultad
                    </p>
                @endif
            </div>
            <div>
                <h3>PROGRAMA DE ESTUDIO</h3>
                <form action="{{ route('estandar.actualizarNarrativaPrograma', $estandar) }}" method="POST">
                    @csrf
                    <div id="toolbar"></div>
                    <div id="editor1" class="">{!! $narrativa->misionPrograma !!}</div>
                    <input type="hidden" name="programa" id="hiddenContentPrograma">
                    <button id="content" class="py-2 px-4 bg-green-500 rounded-lg mt-2"
                        onclick="verPrograma()">Guardar</button>
                </form>
            </div>
            <div>
                <h3>DESCRIPCIÓN</h3>
                @foreach ($problematicas as $problematica)
                    <p>{{ $problematica->description }}</p> <br>
                @endforEach
                <button id="content" class="py-2 px-4 bg-green-500 rounded-lg mt-2" onclick="problematica()">Agregar
                    Problematica</button>
            </div>
        </div>
        <!-- Controles de zoom -->
        <div class="zoom-controls">
            <button onclick="zoomIn()" class="px-3 py-1 bg-gray-200 rounded mr-2">+</button>
            <button onclick="zoomOut()" class="px-3 py-1 bg-gray-200 rounded mr-2">-</button>
            <button onclick="resetZoom()" class="px-3 py-1 bg-gray-200 rounded">Reset</button>
        </div>

        {{-- modal form problematica hecho con tailwind --}}
        <div id="modal" class="hidden fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 w-full sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    Agregar Problematica
                                </h3>
                                <div class="mt-2">
                                    <form action="{{ route('problematica.store', [$narrativa, $contextualizacion]) }}"
                                        method="POST">
                                        @csrf
                                        <div>
                                            <label for="nombre"
                                                class="block text-sm font-medium text-gray-700">Nombre</label>
                                            <input type="text" name="nombre"
                                                class="border w-full rounded-md px-2 shadow-md">
                                        </div>
                                        <div class="my-2">
                                            <label for="description"
                                                class="block text-sm font-medium text-gray-700">Descripción</label>
                                            <textarea name="description" class="border rounded-md w-full px-2 shadow-md"></textarea>
                                        </div>
                                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                            <button type="submit"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Guardar
                                            </button>
                                            <button type="button"
                                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                                id="close">
                                                Cancelar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var quill1 = new Quill('#editor1', {
        theme: 'snow'
    });
</script>
