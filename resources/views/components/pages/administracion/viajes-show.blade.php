@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    @if ($data['isDate'])
        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> Fecha: {{ $data['date'] }} </h1>

        @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />
        @endif

        <div class="flex flex-row">
            @if ($data['viajes'] != null)
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium text-lg dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Hora</th>
                                        <th scope="col" class="px-6 py-4">Precio</th>
                                        <th scope="col" class="px-6 py-4">Placa</th>

                                        <th scope="col" colspan="3" class="px-6 text-center py-4">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data['viajes'] as $viaje)
                                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $viaje->hora }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $viaje->precio ?? 'No asignado' }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $viaje->placa ?? 'No asignado' }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <a href="{{ route('administracion.viajes.show', $viaje->id) }}"
                                                        class="text-blue-600 hover:text-blue-900">Mostrar</a>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <a href="{{ route('administracion.viajes.edit', $viaje->id) }}"
                                                        class="text-green-600 hover:text-green-900">Editar</a>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <form action="{{ route('administracion.viajes.destroy', $viaje->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    No hay viajes registrados para esta fecha
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    @else

        <h1 class="text-3xl font-extrabold pb-4 text-gray-700"> Fecha: {{ $data['viaje']->fecha }} Hora: {{ $data['viaje']->hora }} </h1>
        
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
                                    <th class="px-6 py-4">Precio</th>
                                    <th class="px-6 py-4"> {{ $data['viaje']->precio ?? 'No asignado' }} </th>
                                </tr>
                                <tr class="border-b bg-success-100 text-neutral-800">
                                    <th class="px-6 py-4">Placa</th>
                                    <th class="px-6 py-4"> {{ $data['viaje']->placa ?? 'No asignado' }} </th>
                                </tr>
                                <tr class="border-b bg-success-100 text-neutral-800">
                                    <th class="px-6 py-4">Ruta</th>
                                    <th class="px-6 py-4"> {{ $data['viaje']->ruta->nombre }} </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- titulo Ruta y tiempos de viaje --}}
        <h1 class="text-2xl font-extrabold pb-4 text-gray-700 mt-4">
            Itinerario de viaje
        </h1>


        <ol class="border-l border-neutral-300 dark:border-neutral-500 mb-4">
            @foreach ($data['ubigeos'] as $index => $ubigeo)
                <li>
                    <div class="flex-start flex items-center pt-3">
                        <div
                        class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-neutral-300 dark:bg-neutral-500"></div>
                        <p class="text-sm text-gray-600 dark:text-gray-500">
                            {{$data['tiempos'][$index]}}
                        </p>
                        <a class="ml-auto bg-green-600 rounded-md px-2 text-gray-50 text-sm font-medium py-1.5"
                            href="{{ route('administracion.viajes.edit', $data['viaje']->id) }}">
                            +/- Tiempo
                        </a>
                    </div>
                    <div class="mb-6 ml-4 mt-2">
                        <h4 class="mb-1.5 text-xl font-semibold">
                            {{ $ubigeo->region }} - {{ $ubigeo->province }} - {{ $ubigeo->district }}
                        </h4>
                        @if ($index == 0)
                            <p class="mb-3 text-blue-500 dark:text-gray-400">
                                Origen
                            </p>
                        @elseif ($index == count($data['ubigeos']) - 1)
                            <p class="mb-3 text-green-500 dark:text-gray-400">
                                Destino
                            </p>
                        @else
                            <p class="mb-3 text-yellow-500 dark:text-gray-400">
                                Nodo intermedio
                            </p>
                        @endif
                    </div>
                </li>

            @endforeach
        </ol>

    @endif
</div>