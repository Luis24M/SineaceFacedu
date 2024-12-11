<nav class="fixed z-10 bg-[#D5D6E7] w-9/12 lg:w-7/12 h-20 drop-shadow-md">
  <ul class="w-full flex justify-around text-lg font-semibold items-center h-full">
    <li><a href="{{ route('estandar.index', $estandar) }}">Contextualización</a></li>
    <li><a href="{{ route('estandar.narrativa', $estandar) }}">Narrativa</a></li>
    <li><a href="{{ route('estandar.brechas', $estandar) }}">Brechas</a></li>
    <li><a href="{{ route('estandar.planMejora', $estandar) }}">Planes de mejora</a></li>
  </ul>
</nav>