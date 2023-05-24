@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    @if ($data['servicio'] == null)
        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> El id del servicio no existe </h1>
    @else
        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> Servicio: {{ $data['servicio']->nombre }} </h1>
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
                            <tr class="border-b bg-success-100 text-neutral-800">
                                <th class="px-6 py-4">Descripción</th>
                                <th class="px-6 py-4 w-32"> {{ $data['servicio']->descripcion }} </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
