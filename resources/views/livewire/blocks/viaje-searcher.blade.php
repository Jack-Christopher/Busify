<div class="m-2">
    <div class="flex flex-row justify-between my-4">
        <button wire:click="previousYear" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded-s-lg">
            <span class="text-xl">
                <
            </span>
        </button>

        <h1 class="text-3xl font-bold text-gray-700 border-gray-200 border-2 px-2 text-center mb-2">
            {{ $year}}
        </h1>

        <button wire:click="nextYear" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded-e-lg">
            <span class="text-xl">
                >
            </span>
        </button>
    </div>

    <div class="flex flex-row justify-between my-4">
        <button wire:click="previousMonth" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded-s-lg">
            <span class="text-xl">
                <
            </span>
        </button>

        @php
            $months = [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ];
        @endphp

        <h2 class="text-2xl font-bold text-gray-700 border-gray-200 border-2 px-2 text-center mb-4">
            {{ $months[$month - 1] }}
        </h2>

        <button wire:click="nextMonth" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded-e-lg">
            <span class="text-xl">
                >
            </span>
        </button>
    </div>

    {{-- grid 5x7 for days --}}
    <div>
        <div class="grid grid-cols-7 gap-2">
            {{-- set the seven days of the week --}}
            @php
                $dayLetters = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];
            @endphp
            @foreach ($dayLetters as $item)
                <div class="flex flex-col items-center">
                    <div class="flex flex-row">
                        <div class="flex flex-col">
                            <p class="text-xl font-bold text-gray-700 border-gray-200 border-2 px-2 bg-gray-200">
                                {{ $item }}
                            </p>
                        </div>
                    </div>
                </div>    
            @endforeach
                    
            @for ($week = 0; $week < 5; $week++)
                @for ($d=1; $d <= 7; $d++)
                    @php
                        $day = $week * 7 + $d - $firstDayOfMonth + 1;
                        $date = $year . '-' . $month . '-' . $day;
                        // $date = $day . '-' . $month . '-' . $year;
                    @endphp
                    @if ($day <= $daysInMonth)
                        <div class="flex flex-col items-center">
                            <div class="flex flex-row">
                                <div class="flex flex-col">
                                    <a href="{{ route('administracion.viajes.show', ['viaje' => $date]) }}"
                                        class="text-xl font-bold text-gray-700 border-gray-200 border-2 px-2 hover:bg-gray-200"
                                    >
                                        @if (!($week == 0 && $d < $firstDayOfMonth) && !($week == 4 && $d > $daysInMonth))
                                            {{ $day }}
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            @endfor
        </div>
    </div>
</div>
