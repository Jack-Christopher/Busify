@php
    $data = $attributes['data'];
    // $ubigeosZone = request()->route()->parameter('ubigeosZone');
    // ubigeos like xxyyzz
    // $ubigeosZone = ['010203', '030201', '010304', '050601']
@endphp

<div class="flex flex-col items-center">
    
    <h1 class="text-3xl font-bold text-gray-700">Agregar Duración de Viaje</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />    
    @endif

    {{-- @if (isset($ubigeosZone)) --}}
    @if (1==1)
        <form action="{{ route('administracion.duracion-de-viaje.store') }}" method="POST">
            @csrf

            <table class="mt-4">
                @foreach ($data['ubigeo_zones'] as $index => $item)
                    @if ($index < count($data['ubigeo_zones']) - 1)
                        <tr class="border-gray-500 border-2 pl-4">
                            <td class="m-4 p-4">
                                <label for="duracionViaje[{{ $data['ubigeo_zones'][$index] }}][{{ $data['ubigeo_zones'][$index+1] }}]">
                                    {{ $data['ubigeo_zones'][$index]->ubigeoName() }}
                                    <hr />
                                    {{ $data['ubigeo_zones'][$index+1]->ubigeoName() }}
                                </label>
                            </td>
                            <td>
                                <div class="flex flex-row justify-center items-center pr-4">
                                    <input type="number" name="duracionViaje_{{ $data['ubigeo_zones'][$index]->ubigeo_id }}_{{ $data['ubigeo_zones'][$index+1]->ubigeo_id }}"
                                        value="{{ $data['duraciones'][$index] }}" class="m-2 float-right w-24 text-center" />
                                    <p>minutos</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>

            <div class="flex flex-col py-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Agregar las Duraciones de Viaje
                </button>
            </div>

        </form>
    @else
        <form action="{{ route('administracion.servicios.store') }}" method="POST">
            @csrf
            <div class="flex flex-col pt-4">
                @livewire('elements.ubigeo-searcher', ['addButton' => true], key('city_a'))

                @livewire('elements.ubigeo-searcher', ['addButton' => true], key('city_b'))
            </div>
            <div class="flex flex-col py-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Agregar Duración de Viaje
                </button>
            </div>
        </form>
    @endif

</div>