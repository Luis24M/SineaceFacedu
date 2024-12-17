<h2 class="text-4xl p-4 font-semibold">PLANES DE MEJORA</h2>
<hr>
<ul>
    @if ($problematicas === null)
        <p>No se encontraron brechas</p>
    @else
        @foreach ($problematicas as $problematica)
            <li class="mx-auto list-decimal  max-w-96">
                <form class="flex justify-around my-5" action="{{ route('problematica.update', $problematica) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <input class="px-2 py-1 rounded-md border" type="text" name="nombre"
                        value="{{ $problematica->nombre }}">
                    <button class="px-2 py-1 rounded-md bg-green-500">Actualizar</button>
                </form>
            </li>
        @endforEach
    @endif
</ul>
