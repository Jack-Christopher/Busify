@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all zones --}}
    @if ($data['zone'] == null)
        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> No hay zonas registradas </h1>
    @else
        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> Zona: {{ $data['zone']->name }} </h1>
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
                    @if (count($data['ubigeos']) > 0)
                        <table class="min-w-full text-center text-sm font-light">
                            <thead class="border-b text-lg dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-extrabold">Tipo</th>
                                    <th scope="col" class="px-6 py-4">Región</th>
                                    <th scope="col" class="px-6 py-4">Provincia</th>
                                    <th scope="col" class="px-6 py-4">Distrito</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-primary-200 bg-primary-200 text-neutral-800">
                                    <td class="whitespace-nowrap px-6 py-4 font-extrabold">
                                        Origen
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4"> {{ $data['ubigeos'][0]->region }} </td>
                                    <td class="whitespace-nowrap px-6 py-4"> {{ $data['ubigeos'][0]->province }} </td>
                                    <td class="whitespace-nowrap px-6 py-4"> {{ $data['ubigeos'][0]->district }} </td>
                                </tr>

                                @for ($i = 1; $i < count($data['ubigeos'])-1; $i++)
                                    <tr class="border-b border-secondary-200 bg-warning-300 text-neutral-800">
                                        <td class="whitespace-nowrap px-6 py-4 font-extrabold">
                                            Nodos Intermedios
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4"> {{ $data['ubigeos'][$i]->region }} </td>
                                        <td class="whitespace-nowrap px-6 py-4"> {{ $data['ubigeos'][$i]->province }} </td>
                                        <td class="whitespace-nowrap px-6 py-4"> {{ $data['ubigeos'][$i]->district }} </td>
                                    </tr>
                                @endfor

                                <tr class="border-b border-success-200 bg-success-200 text-neutral-800">
                                    <td class="whitespace-nowrap px-6 py-4 font-extrabold">
                                        Destino
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4"> {{ $data['ubigeos'][count($data['ubigeos'])-1]->region }} </td>
                                    <td class="whitespace-nowrap px-6 py-4"> {{ $data['ubigeos'][count($data['ubigeos'])-1]->province }} </td>
                                    <td class="whitespace-nowrap px-6 py-4"> {{ $data['ubigeos'][count($data['ubigeos'])-1]->district }} </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <div class="flex flex-col items-center justify-center">
                            <p> No hay datos para mostrar </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
