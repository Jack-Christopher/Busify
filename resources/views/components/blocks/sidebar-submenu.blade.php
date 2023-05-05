<div class="flex flex-col space-y-2"
    x-cloak x-show="selected == '{{ $name }}'">
    <hr class="my-2 border-gray-200 dark:border-gray-700">

    @for ($i = 0; $i < count($options); $i++)
        @foreach ($options[$i] as $op)
            <button @click="option = '{{ $op }}', isVisible = false"
            {{-- on hover do something --}}
                class="float-left hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-gray-700 dark:hover:text-gray-200 hover:shadow-lg hover:rounded-lg hover:font-bold hover:cursor-pointer hover:transition hover:duration-150 hover:ease-in-out">
                {{ $op }}
            </button>
        @endforeach
        @if ($i < (count($options) - 1))
                <hr class="my-2 border-gray-200 dark:border-gray-700">
            @endif
    @endfor
</div>