<!-- filepath: /home/sackler/Desktop/projects/php/Filar/resources/views/dates/show.blade.php -->
<x-layouts.app>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="bg-card-bg rounded-lg shadow p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">
                            {{ $date->title ?: 'Untitled Date' }}
                        </h1>
                        <p class="text-lg text-gray-600">
                            {{ $date->date->format('F j, Y') }}
                            @if($date->time)
                                at {{ $date->time->format('g:i A') }}
                            @endif
                            <span class="text-sm text-gray-500 ml-2">
                                ({{ $date->date->diffForHumans() }})
                            </span>
                        </p>
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('dates.edit', $date) }}" class="btn-primary">
                            Edit
                        </a>
                        <form action="/dates/{{ $date->id }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-secondary" 
                                    onclick="return confirm('Are you sure you want to delete this date?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                @if($date->description)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Description</h3>
                        <div class="bg-gray-50 rounded p-4">
                            <p class="text-gray-700 whitespace-pre-line">{{ $date->description }}</p>
                        </div>
                    </div>
                @endif

                <div class="border-t pt-6">
                    <p class="text-sm text-gray-500">
                        Created {{ $date->created_at->format('F j, Y \a\t g:i A') }}
                        @if($date->updated_at != $date->created_at)
                            • Updated {{ $date->updated_at->format('F j, Y \a\t g:i A') }}
                        @endif
                    </p>
                </div>

                <div class="mt-6">
                    <a href="{{ route('dates.index') }}" class="link-button">
                        ← Back to Dates
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>