<div class="flex flex-col space-y-2"
    :class="{'block': selected == '{{ $name }}', 'hidden': selected != '{{ $name }}' }">
    <hr class="my-2 border-gray-200 dark:border-gray-700">

    @for ($i = 0; $i < count($options); $i++)
        @foreach ($options[$i] as $op)
            <button class="float-left">
                {{ $op }}
            </button>
        @endforeach
        @if ($i < (count($options) - 1))
                <hr class="my-2 border-gray-200 dark:border-gray-700">
            @endif
    @endfor
</div>