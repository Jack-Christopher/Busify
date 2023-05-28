@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all zones --}}
    <h1 class="text-3xl font-bold text-gray-700">Crear Viaje(s)</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />
    @endif


    <form action="{{ route('administracion.viajes.store') }}" method="POST"
        x-data="{ rango_fechas: false }"
    >
        @csrf
        <div class="flex flex-col pt-4">
            <label for="ruta_id">Ruta</label>
            <select name="ruta_id" id="ruta_id" class="border border-gray-300 rounded-md">
                <option value="">Seleccione una ruta</option>
                @foreach ($data['rutas'] as $ruta)
                    <option value="{{ $ruta->id }}">{{ $ruta->nombre }}</option>
                @endforeach
            </select>

            {{-- fecha --}}
            <label for="fecha" x-show="!rango_fechas">Fecha del viaje individual</label>
            <input type="date" name="fecha" id="fecha" class="border border-gray-300 rounded-md" 
                x-show="!rango_fechas">
            
            {{-- hora --}}
            <label for="hora">Hora</label>
            <input type="time" name="hora" id="hora" class="border border-gray-300 rounded-md">
        </div>


        {{-- checkbox for Rango de Fechas --}}
        <div class="flex flex-col pt-4">
            <div class="flex flex-row">
                <input type="checkbox" name="rango_fechas" id="rango_fechas" class="border border-gray-300 rounded-md p-3"
                    x-on:click="rango_fechas = !rango_fechas">
                <label for="rango_fechas" class="ml-3">Aplicar por Rango de Fechas</label>
            </div>

            {{-- datepicker for Fecha Inicio y Fin --}}
            <div class="flex flex-col pt-4" 
                x-show="rango_fechas">
                <label for="fecha_inicio">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="border border-gray-300 rounded-md">

                <label for="fecha_fin">Fecha Fin</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="border border-gray-300 rounded-md">
            </div>
        </div>


        <div class="flex flex-col py-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Crear Viaje
            </button>
        </div>
    </form>
</div>