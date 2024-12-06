<div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden" id="modal">
    <div class="absolute top-0 left-0 w-full h-full" onclick="modal()"></div>
    <div class="bg-white w-1/3 p-4 rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="flex justify-end">
            <button class="px-2 py-1 bg-red-600 text-white rounded-lg" onclick="modal()">X</button>
        </div>
        <h1 class="text-2xl font-bold text-center">Agregar usuario</h1>
        <form action="{{ isset($usuario) ? route('usuarios.update', $usuario->id) : route('usuarios.crear', $programa) }}" method="POST" class="space-y-3 mt-3">
            @csrf
            @if(isset($usuario))
                @method('PUT') <!-- Necesario para editar -->
            @endif        
            <div class="flex flex-col">
                <label for="name" class="text-sm">Nombre</label>
                <input type="text" name="name" id="name" class="border border-gray-300 rounded-lg p-1"
                    value="{{ isset($usuario) ? $usuario->name : '' }}">
            </div>
            <div class="flex flex-col">
                <label for="lastname" class="text-sm">Apellido</label>
                <input type="text" name="lastname" id="lastname" class="border border-gray-300 rounded-lg p-1"
                    value="{{ isset($usuario) ? $usuario->lastname : '' }}">
            </div>
            <div class="flex flex-col">
                <label for="email" class="text-sm">Correo</label>
                <input type="email" name="email" id="email" class="border border-gray-300 rounded-lg p-1"
                    value="{{ isset($usuario) ? $usuario->email : '' }}">
            </div>
            <div class="flex flex-col">
                <label for="dni" class="text-sm">DNI</label>
                <input type="text" name="dni" id="dni" class="border border-gray-300 rounded-lg p-1"
                    value="{{ isset($usuario) ? $usuario->dni : '' }}">
            </div>
            <div class="flex flex-col">
                <label for="subcomite" class="text-sm">Subcomite</label>
                <select name="subcomite" id="subcomite" class="border border-gray-300 rounded-lg p-1">
                    @foreach ($subcomites as $subcomite)
                        <option value="{{ $subcomite->id }}"
                            {{ isset($usuario) && $usuario->subcomite_id == $subcomite->id ? 'selected' : '' }}>
                            {{ $subcomite->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="programa" value="{{ $programa->nombre }}" id="">
            <div class="flex justify-end">
                <button type="submit" class="px-2 py-1 bg-green-600 text-white rounded-lg">
                    {{ isset($usuario) ? 'Actualizar' : 'Agregar' }}
                </button>
            </div>
        </form>
    </div>
</div>
