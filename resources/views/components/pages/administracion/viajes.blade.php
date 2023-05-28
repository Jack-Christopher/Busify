@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all sucursales --}}
    <h1 class="text-3xl font-bold text-gray-700">Listado de Viajes</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />
    @endif

    <div class="flex flex-row">
        @if ($data['viajes'] != null)
            @livewire('blocks.viaje-searcher')
        @else
            <p> Something went wrong </p>
        @endif

        {{-- Create Zona Button --}}
        <div class="flex flex-col px-24 m-4">
            <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-viaje_114360-1247.jpg" alt="Add Viaje" class="w-64 h-64">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="{{ route('administracion.viajes.create') }}"
                >
                <span class="text-xl">
                    Crear Viaje(s)
                </span>
            </a>
        </div>
    </div>
</div>