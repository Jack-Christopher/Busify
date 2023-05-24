@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all zones --}}
    <h1 class="text-3xl font-bold text-gray-700">Crear Servicio</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />    
    @endif

    <form action="{{ route('administracion.servicios.store') }}" method="POST">
        @csrf
        <div class="flex flex-col pt-4">
            <label for="name">Nombre del Servicio</label>
            <input type="text" name="nombre" id="nombre" placeholder="🪧 Servicio xyz" size="50">

            <label for="description">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="6" placeholder="Descripción del servicio"></textarea>

        </div>
        <div class="flex flex-col py-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Crear Servicio
            </button>
        </div>
    </form>



</div>