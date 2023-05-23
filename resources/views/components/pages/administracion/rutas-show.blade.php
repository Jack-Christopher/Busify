@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    @if ($data['ruta'] == null)
        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> El id de la ruta no existe </h1>
    @else
        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> Ruta: {{ $data['ruta']->nombre }} </h1>
    @endif

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />
    @endif

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center text-sm font-light">
                        <tbody class="text-lg">
                            <tr class="border-b bg-primary-100 text-neutral-800">
                                <th class="px-6 py-4">Precio</th>
                                <th class="px-6 py-4"> S/. {{ $data['ruta']->precio }} </th>
                            </tr>
                            <tr class="border-b bg-info-200 text-neutral-800">
                                <th class="px-6 py-4">Zona</th>
                                <th class="px-6 py-4"> 
                                    {{ $data['zona']->name }}
                                </th>
                            </tr>
                            <tr class="border-b bg-success-100 text-neutral-800">
                                <th class="px-6 py-4"> Origen </th>
                                <th class="px-6 py-4"> {{ $data['origen']->region }} - {{ $data['origen']->province }} - {{ $data['origen']->district }} </th>
                            </tr>
                            <tr class="border-b bg-success-200 text-neutral-800">
                                <th class="px-6 py-4">Destino</th>
                                <th class="px-6 py-4"> {{ $data['destino']->region }} - {{ $data['destino']->province }} - {{ $data['destino']->district }} </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
