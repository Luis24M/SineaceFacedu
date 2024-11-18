@extends('layouts.usuario')

@section('content')
<section class="flex bg-slate-500 ml-[350px]">
    @include('partials.contextBar')

  <section class="w-[500px] min-h-screen fixed right-0 bg-[#D5D6E7] px-20 py-7">
    <section>
      <h2 class="text-xl font-medium">Estandar {{$estandar->nombre}}</h2>
      <p class="text-md my-3">{{$estandar->descripcion}} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam, molestiae fuga repudiandae culpa vero quas doloribus exercitationem explicabo eius! Consectetur non veritatis nobis odit impedit molestias, amet aspernatur veniam harum.</p>
    </section>
    <section>

    </section>
  </section>
</section>
@endsection