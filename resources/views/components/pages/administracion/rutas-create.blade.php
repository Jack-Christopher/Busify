@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all zones --}}
    <h1 class="text-3xl font-bold text-gray-700">Crear Ruta</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />    
    @endif

    <form action="{{ route('administracion.rutas.store') }}" method="POST">
        @csrf
        <div class="flex flex-col pt-4">
            <label for="name">Nombre de la Ruta</label>
            <input type="text" name="nombre" id="nombre" placeholder="🪧 Ruta xyz" size="50">

            @livewire('blocks.ruta-setter')

            <label for="price">Precio</label>
            <input type="number" name="precio" id="precio" placeholder="S/ 0.00" step="1.00" min="0.00" max="99999.99">

            <label for="price">Servicio</label>
            <select name="servicio_id" id="servicio_id">
                <option value="">Seleccione un servicio</option>
                @foreach ($data['servicios'] as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>

        </div>
        <div class="flex flex-col py-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Crear Ruta
            </button>
        </div>
    </form>



</div>