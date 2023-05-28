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
                                                    <a href="#" class="text-green-600 hover:text-green-900">Editar</a>
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
        Es Viaje
    @endif
</div>