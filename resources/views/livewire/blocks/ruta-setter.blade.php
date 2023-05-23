<div class="flex flex-col pt-4">
    <label for="zona_id">Zona</label>
    <select name="zona_id" id="zona_id" wire:model="zona_id" wire:change="onChangeZona">
        <option value="">Seleccione una zona</option>
        @foreach ($zonas as $zona)
            <option value="{{ $zona->id }}">{{ $zona->name }}</option>
        @endforeach
    </select>

    <label for="origen_id">Origen</label>
    <select name="origen_id" id="origen_id"">
        <option value="">Seleccione el origen</option>
        @foreach ($ubigeoOptions as $origen)
            <option value="{{ $origen->position }}">
                {{ $origen->position }}: {{ $origen->region }} - {{ $origen->province }} - {{ $origen->district }}
            </option>
        @endforeach
    </select>

    <label for="destino_id">Destino</label>
    <select name="destino_id" id="destino_id">
        <option value="">Seleccione el destino</option>
        @foreach ($ubigeoOptions as $destino)
            <option value="{{ $destino->position }}">
                {{ $destino->position }}: {{ $destino->region }} - {{ $destino->province }} - {{ $destino->district }}
            </option>
        @endforeach
    </select>

</div>
