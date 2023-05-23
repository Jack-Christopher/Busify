@php
    $data = $attributes['data'];
@endphp

<div class="flex flex-col items-center">
    {{-- title all sucursals --}}
    <h1 class="text-3xl font-bold text-gray-700">Listado de Rutas</h1>

    @if (session('message') != null)
        <x-elements.alert 
            message="{{ session('message') }}"
        />
    @endif

    <div class="flex flex-row">
        @if ($data['rutas'] != null)
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
                                    @forelse ($data['rutas'] as $ruta)
                                        <tr class="border-b transition duration-300 ease-in-out hover:bg-slate-500 dark:border-slate-200 dark:hover:bg-slate-300">
                                            <td class="whitespace-nowrap px-6 py-4">
                                                {{ $ruta->nombre }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <a href="{{ route('administracion.rutas.show', $ruta->id) }}" 
                                                    class="text-blue-600 hover:text-blue-900">Mostrar</a>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <a href="#" class="text-green-600 hover:text-green-900">Editar</a>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <form action="{{ route('administracion.rutas.destroy', $ruta->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <p> No hay rutas registradas </p>            
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
            <img src="https://img.freepik.com/vector-gratis/gente-diminuta-que-usa-aplicacion-movil-mapa-al-aire-libre_74855-7881.jpg" alt="Agregar ruta" class="w-80 h-52">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="{{ route('administracion.rutas.create') }}"
                >
                <span class="text-xl">
                    Crear Ruta
                </span>
            </a>
        </div>
    </div>
</div>