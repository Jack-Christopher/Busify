<div class="flex flex-col mt-2">

    @livewire('elements.ubigeo-searcher')

    @foreach ($selectedOptions as $index => $option)
        <div class="flex flex-row">
            <div class="flex flex-col mr-4 pt-2">
                <button class="border border-gray-950 px-2 rounded-t-lg shadow-sm bg-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    wire:click.prevent="moveUp({{ $index }})" >
                    ▲
                </button>
                <button class="border border-gray-950 px-2 rounded-b-lg shadow-sm bg-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    wire:click.prevent="moveDown({{ $index }})" >
                    ▼
                </button>
            </div>

            @if ($index == 0)
                <div class="mb-3 inline-flex w-full items-center rounded-lg bg-primary-100 px-6 py-5 text-base text-primary-700"
                    role="alert">
                    <span class="mr-2">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                            fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ $option['name'] }}
                </div>
            @elseif ($index ==  count($selectedOptions) - 1)
                <div class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-6 py-5 text-base text-success-700"
                    role="alert">
                    <span class="mr-2">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                            fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                            clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ $option['name'] }}
                </div>
            @else
                <div class="mb-3 inline-flex w-full items-center rounded-lg bg-warning-100 px-6 py-5 text-base text-warning-800"
                    role="alert">
                    <span class="mr-2">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                            fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ $option['name'] }}
                </div>                
            @endif               
                
            {{-- hidde input with the option['code'] inside --}}
            <input type="hidden" name="ubigeo_{{ $index }}" value="{{ $option['code'] }}">

            <div class="flex flex-col pt-2 ml-4 mt-3">
                <button class="border border-red-950 px-2 rounded-lg shadow-sm bg-red-500 text-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    wire:click.prevent="remove({{ $index }})" >
                    x
                </button>
            </div>
        </div>

    @endforeach
</div>
