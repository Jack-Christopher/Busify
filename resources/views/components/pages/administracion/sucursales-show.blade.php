@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    @if ($data['sucursal'] == null)
        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> El id de la sucursal no existe </h1>
    @else
        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> Sucursal: {{ $data['sucursal']->name }} </h1>
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
                                <th class="px-6 py-4">Razón Social</th>
                                <th class="px-6 py-4"> {{ $data['sucursal']->business_name }} </th>
                            </tr>
                            <tr class="border-b bg-warning-100 text-neutral-800">
                                <th class="px-6 py-4">Ubicación </th>
                                <th class="px-6 py-4"> 
                                    {{ $data['ubigeo']->region }} -> {{ $data['ubigeo']->province }} -> {{ $data['ubigeo']->district }}
                                </th>
                            </tr>
                            <tr class="border-b bg-success-100 text-neutral-800">
                                <th class="px-6 py-4"> Teléfono </th>
                                <th class="px-6 py-4"> {{ $data['sucursal']->phone }} </th>
                            </tr>
                            <tr class="border-b bg-info-200 text-neutral-800">
                                <th class="px-6 py-4">Dirección</th>
                                <th class="px-6 py-4"> {{ $data['sucursal']->address }} </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
