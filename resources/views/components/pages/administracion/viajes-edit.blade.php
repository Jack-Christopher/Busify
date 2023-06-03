@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all zones --}}
    <h1 class="text-3xl font-bold text-gray-700">Editar Viaje</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />
    @endif

    <form action="{{ route('administracion.viajes.update', $data['viaje']->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="flex flex-col pt-4">
            <label for="price">Precio</label>
            <input type="number" name="precio" id="precio" placeholder="S/ 0.00" 
                step="1.00" min="0.00" max="99999.99" value="{{ $data['viaje']->precio }}">

            <div class="flex flex-col pt-4">
                <span class="text-sm font-normal text-red-700 m-3">Retraso (+) o Adelanto (-) en minutos</span>

                @foreach ($data['ubigeos'] as $index => $ubigeo)
                    <label for="variacion_{{ $index }}"> {{ $ubigeo->region }} - {{ $ubigeo->province }} - {{ $ubigeo->district }} </label>

                    <input type="number" name="variacion_{{ $index }}" id="variacion_{{ $index }}" placeholder="Retraso o adelanto en minutos" 
                        step="5" value="{{ $data['variaciones'][$index] }}">
                @endforeach
            </div>
            {{-- HIDDEN N° OF VARIACIONES --}}
            <input type="hidden" name="n_variaciones" id="n_variaciones" value="{{ count($data['ubigeos']) }}">
        </div>

        <div class="flex flex-col py-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Actualizar Viaje
            </button>
        </div>

    </form>
</div>