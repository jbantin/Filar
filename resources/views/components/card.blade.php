<div class="bg-card-bg shadow-md rounded-md p-4 my-4 mx-4 max-w-xl">
    @if(isset($title))
        <h2 class="text-xl font-semibold break-words block">{{ $title }}</h2>        
    @endif
    {{$slot}}
</div>