
<!-- filepath: resources/views/dates/edit.blade.php -->
<x-app-layout>
    <div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Edit Date</h1>
            </div>

            <form action="{{ route('dates.update', $date) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="date" class="form-label">Date *</label>
                    <input type="date" 
                           id="date" 
                           name="date" 
                           value="{{ old('date', $date->date->format('Y-m-d')) }}"
                           class="form-input @error('date') border-red-500 @enderror" 
                           required>
                    @error('date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $date->title) }}"
                           class="form-input @error('title') border-red-500 @enderror" 
                           placeholder="Enter a title for this date">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" 
                              name="description" 
                              rows="4"
                              class="form-input @error('description') border-red-500 @enderror" 
                              placeholder="Add a description...">{{ old('description', $date->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="btn-primary">
                        Update Date
                    </button>
                    <a href="{{ route('dates.show', $date) }}" class="link-button">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>