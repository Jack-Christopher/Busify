<div class="flex flex-row mr-4 mb-4">       
    <input wire:model="searchTerm" type="text" placeholder="Introducir ciudad" 
        class="border border-gray-400 p-2 mr-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">

    <select class="w-64 border border-gray-400 p-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" 
        wire:model="selectedUbigeoCode">
        
        <option value="">Seleccione un resultado</option>
        @foreach ($ubigeoOptions as $ubigeo)
            <option value="{{ $ubigeo->code }}">
                {{ $ubigeo->region . ' - ' . $ubigeo->province . ' - ' . $ubigeo->district; }}
            </option>
        @endforeach
    </select>

    @if ($addButton)
        <button class="bg-warning-500 hover:bg-warning-700 text-white font-bold px-2 ml-4 rounded-lg"
            wire:click.prevent="add()" >
            Agregar
        </button>
    @else
        <input type="hidden" name="ubigeo_id" id="ubigeo_id" value="{{ $selectedUbigeoCode }}">
    @endif
</div>