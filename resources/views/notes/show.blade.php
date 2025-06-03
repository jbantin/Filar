<!-- filepath: resources/views/notes/show.blade.php -->
<x-layouts.app>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="bg-card-bg rounded-lg shadow p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Note</h1>
                        <p class="text-lg text-gray-600">
                            Created {{ $note->created_at->format('F j, Y \a\t g:i A') }}
                            @if($note->updated_at != $note->created_at)
                                • Updated {{ $note->updated_at->format('F j, Y \a\t g:i A') }}
                            @endif
                        </p>
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('notes.edit', $note) }}" class="btn-primary">
                            Edit
                        </a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-secondary" 
                                    onclick="return confirm('Are you sure you want to delete this note?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="bg-gray-50 rounded p-6">
                        <p class="text-gray-700 whitespace-pre-line text-lg leading-relaxed">{{ $note->note }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('notes.index') }}" class="link-button">
                        ← Back to Notes
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>