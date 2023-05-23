@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all sucursales --}}
    <h1 class="text-3xl font-bold text-gray-700">Listado de Sucursales</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />
    @endif

    <div class="flex flex-row">
        @if ($data['sucursales'] != null)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium text-lg dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Nombre</th>
                                    <th scope="col" colspan="3" class="px-6 text-center py-4">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data['sucursales'] as $sucursal)
                                        <tr class="border-b transition duration-300 ease-in-out hover:bg-slate-500 dark:border-slate-200 dark:hover:bg-slate-300">
                                            <td class="whitespace-nowrap px-6 py-4">
                                                {{ $sucursal->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <a href="{{ route('administracion.sucursales.show', $sucursal->id) }}" 
                                                    class="text-blue-600 hover:text-blue-900">Mostrar</a>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <a href="#" class="text-green-600 hover:text-green-900">Editar</a>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <form action="{{ route('administracion.sucursales.destroy', $sucursal->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <p> No hay sucursales registradas </p>            
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p> Something went wrong </p>
        @endif

        {{-- Create Zona Button --}}
        <div class="flex flex-col justify-center items-center px-24 m-4">
            <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-embalaje-digital_114360-7510.jpg" alt="Add sucursal" class="w-64 h-64">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="{{ route('administracion.sucursales.create') }}"
                >
                <span class="text-xl">
                    Crear Sucursal
                </span>
            </a>
        </div>
    </div>
</div>