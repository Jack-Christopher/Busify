@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all zones --}}
    <h1 class="text-3xl font-bold text-gray-700">Crear Zona</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />
    @endif


    <form action="{{ route('administracion.zonas.store') }}" method="POST">
        @csrf
        <div class="flex flex-col pt-4">
            <label for="name">Nombre de la Zona</label>
            <input type="text" name="name" id="name" placeholder="Origen - Destino">
        </div>
        <div class="flex flex-col pt-2">
            <h3> Agregue las ciudades </h3>

            @livewire('blocks.ubigeo-searcher-group')
            
        </div>
        <div class="flex flex-col py-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Crear Zona
            </button>
        </div>
    </form>
</div>