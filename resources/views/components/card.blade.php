<div class="bg-gray-100 shadow-md rounded-md p-4 my-4 mx-4 max-w-xl">
    @if(isset($title))
        <h2 class="text-xl font-semibold mb-4 break-words block">{{ $title }}</h2>        
    @endif
    {{$slot}}
</div>