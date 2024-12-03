@extends('layouts.admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
@section('content')
    <div class="h-1/4 ">
        <h1 class="ml-[350px] text-6xl"><b>Mis programas</b></h1>
    </div>
    <div class="ml-[350px] bg-orange-100 h-1/2 border-2 border-orange-500 text-orange-700 p-4 w-3/4 mt-5 flex flex-col justify-center items-center">
    @if(count($programas) > 0)
        <p>si hay programas</p>
    @else
        <div>
            <h2 class="text-3xl h-1/2 flex flex-col items-center justify-center">No hay programas actualmente</h2>
        </div>
    @endif

        <div class="h-1/2 flex flex-col items-center justify-center">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                Agregar
            </button>
        </div>


<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Crear Nuevo Programa
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5 " id="programaForm" action="{{ route('home.crearPrograma') }}" method="POST">
                @csrf
                <div class="flex flex-col">
                <label class="block mb-2 text-sm font-medium text-gray-900 mb-5  text-xl"><b>Programa</b></label>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre del Programa</label>
                        <input type="text" name="programa" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Type product name" required="">
                    </div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 mb-5 mt-5 text-xl"><b>Representante</b></label>
                    <div class="flex flex-row space-x-3">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Nombre</label>
                            <input type="text" name="nombre" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Type product name" required="">
                        </div>
                        <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Apellido</label>
                        <input type="text" name="apellido" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Type product name" required="">
                        </div>
                    </div>
                    <div class="w-full mb-5 mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Correo Electronico</label>
                        <input type="text" name="email" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Type product name" required="">
                    </div>
                    
                    <button onclick="crearPrograma()" type="submit" class=" w-3/4 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Agregar nuevo programa
                    </button>
                    
            </form>
        </div>
    </div>
</div> 

</div> 
<script>
function crearPrograma(){
    
    const programaForm = document.getElementById('programaForm')
    const data = new FormData(programaForm)
    const jsonDT = Object.fromEntries(data.entries())
    console.log(jsonDT)
}
</script>
@endsection

