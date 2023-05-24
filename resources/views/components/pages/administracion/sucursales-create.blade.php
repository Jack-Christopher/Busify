@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all zones --}}
    <h1 class="text-3xl font-bold text-gray-700">Crear Sucursal</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />
    @endif


    <form action="{{ route('administracion.sucursales.store') }}" method="POST">
        @csrf
        <div class="flex flex-col pt-4">
            {{-- in the placeholder set a common example --}}
            <label for="name">Nombre de la Sucursal</label>
            <input type="text" name="name" id="name" placeholder="🪧 Sucursal xyz" size="50">

            <label for="business_name">Razón Social</label>
            <input type="text" name="business_name" id="business_name" placeholder="🏡 Sucursal SAC" size="50">

            <span class="mt-4">
                @livewire('elements.ubigeo-searcher', ['addButton' => false])
            </span>

            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" placeholder="🕿 999999999" size="50">

            <label for="address">Dirección</label>
            <input type="text" name="address" id="address" placeholder="🌐 Calle Abc Def #123" size="50">
        </div>
        <div class="flex flex-col py-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Crear Sucursal
            </button>
        </div>
    </form>
</div>