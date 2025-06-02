
<!-- filepath: resources/views/dates/index.blade.php -->
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-900">My Dates</h1>
                <a href="{{ route('dates.create') }}" class="btn-primary">
                    Add New Date
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($dates->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($dates as $date)
                        <div class="bg-card-bg rounded-lg shadow p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $date->title ?: 'Untitled' }}
                                </h3>
                                <span class="text-sm text-gray-500">
                                    {{ $date->date->format('M j, Y') }}
                                </span>
                            </div>
                            
                            @if($date->description)
                                <p class="text-gray-600 mb-4">
                                    {{ Str::limit($date->description, 100) }}
                                </p>
                            @endif

                            <div class="flex space-x-2">
                                <a href="{{ route('dates.show', $date) }}" class="link-button text-xs">
                                    View
                                </a>
                                <a href="{{ route('dates.edit', $date) }}" class="btn-primary">
                                    Edit
                                </a>
                                <form action="{{ route('dates.destroy', $date) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-secondary" 
                                            onclick="return confirm('Are you sure you want to delete this date?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg mb-4">No dates found.</p>
                    <a href="{{ route('dates.create') }}" class="btn-primary">
                        Create Your First Date
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>