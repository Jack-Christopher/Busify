<button @click="selected = (selected == '{{ $name }}')? '' : '{{ $name }}'"
    class="w-full flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
    <div class="float-right">
        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            {{ $slot }}
        </svg>
    </div>                            
    <span class="flex-1 ml-3 whitespace-nowrap">
        {{ $name }}
    </span>
    <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">
        ➤
    </span>
</button>
