<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4" role="alert"
    x-data="{ open: true }" x-show="open">
    <strong class="font-bold" >
        {{ $message }} &nbsp; &nbsp; &nbsp;
    </strong>
    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="open = false">
        <span aria-hidden="true">&times;</span>
    </button>    
</div>