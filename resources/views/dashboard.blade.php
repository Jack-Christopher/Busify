<x-app-layout>
    <div x-data="{ isVisible: window.innerWidth >= 640, selected: '', option: '' }"
        class="flex flex-row">

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
            <x-blocks.sidebar />
        </div>

        {{-- vista principal --}}
        <div class="flex-1 bg-white mt-[64px]"
            :class="{'ml-80': window.innerWidth >= 640, 'ml-12': window.innerWidth < 640 }">

            @if ( request()->path() == 'dashboard' )
                <h1 class="text-3xl pt-4 font-bold p-4 text-gray-950 dark:text-gray-500 text-center">
                    Seleccione una opción del menú
                </h1>
                <img src="{{ asset('img/dashboard.png') }}" alt="background" class="w-1/2 mx-auto">
            @else
                {{-- component rendered from controller as parameter --}}
                <x-dynamic-component :component="$componentName" />
            @endif

        
        </div>
    </div>
</x-app-layout>
