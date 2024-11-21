<nav class="fixed z-10 bg-[#D5D6E7] w-[calc(100%-850px)]  h-20 drop-shadow-md">
  <ul class="w-full flex justify-around text-lg font-semibold items-center h-full">
    <li><a href="{{ route('estandar.index', $estandar->nombre) }}">Contextualización</a></li>
    <li><a href="{{ route('estandar.narrativa', $estandar->nombre)}}">Narrativa</a></li>
    <li><a href="">Brechas</a></li>
    <li><a href="">Planes de mejora</a></li>
  </ul>
</nav>