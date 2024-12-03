@extends('layouts.adminPrograma')

@section('content')
<div >
      
    <div class="h-1/4">
        <h1 class="text-center text-6xl font-bold pl-[350px]">Mis Subcomites</h1>
    </div>

    
    <div class="ml-[350px] bg-orange-100 h-3/4 border-2 border-orange-500 text-orange-700 p-4 w-3/4 mt-5 flex flex-col justify-center items-center">
        <h2 class="text-3xl">No hay programas actualmente</h2>
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">
            Agregar
        </button>
    </div>
    

</div>

@endsection