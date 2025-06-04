<!-- filepath: resources/views/notes/index.blade.php -->
<x-layouts.app>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-900">My Notes</h1>
                <a href="{{ route('notes.create') }}" class="btn-primary">
                    Add New Note
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($notes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($notes as $note)
                        <div class="bg-card-bg rounded-lg shadow p-6">
                            <div class="flex justify-between items-start mb-4">
                                <span class="text-sm text-gray-500">
                                    {{ $note->created_at->format('M j, Y \a\t g:i A') }}
                                </span>
                            </div>
                            
                            <p class="text-gray-700 mb-4">
                                {{ Str::limit($note->note, 150) }}
                            </p>

                            <div class="flex space-x-2">
                                <a href="{{ route('notes.show', $note) }}" class="link-button text-xs">
                                    View
                                </a>
                                <a href="{{ route('notes.edit', $note) }}" class="btn-primary">
                                    Edit
                                </a>
                                <form action="/notes/{{ $note->id }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-secondary" 
                                            onclick="return confirm('Are you sure you want to delete this note?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg mb-4">No notes found.</p>
                    <a href="{{ route('notes.create') }}" class="btn-primary">
                        Create Your First Note
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>