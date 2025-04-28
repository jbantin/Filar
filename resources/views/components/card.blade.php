<div class="bg-white shadow-md rounded-lg p-6 my-4 mx-8 max-w-2xl justify-center">
    @if(isset($title))
        <h2 class="text-xl font-semibold mb-4">{{ $title }}</h2>
        @else
        <h2 class="text-xl font-semibold mb-4">Card</h2>
    @endif
    {{$slot}}
</div>