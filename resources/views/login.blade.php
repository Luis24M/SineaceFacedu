@extends('layouts.login')

@section('content')
<section class="w-1/2 bg-[#EEEFFF] p-12 min-h-[600px] flex flex-col justify-evenly ">
  <h3 class="text-3xl text-center">Bienvenido, por favor ingrese sus datos</h3>
  <form action="{{ route('login')}}" method="POST" class="flex flex-col jsutify-center gap-7 [&>div>label]:p-2 [&>div>label]:text-lg">
    @csrf
    <div>
      <label for="correo">Usuario</label>
      <input type="email" id="correo" name="correo" class="w-full p-2 border border-gray-300 rounded-lg mb-2">
    </div>
    <div>
      <label for="contrasena">Contraseña</label>
      <input type="password" id="contrasena" name="contrasena" class="w-full p-2 border border-gray-300 rounded-lg mb-2">
    </div>    
    <button class="bg-[#D5D6E7] text-white w-full p-2 rounded-lg" type="submit">Ingresar</button>
  </form>
</section>
@endsection