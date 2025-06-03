<!-- filepath: /home/sackler/Desktop/projects/php/Filar/resources/views/dates/create.blade.php -->
<x-layouts.app>
    <div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Add New Date</h1>
            </div>

            <form action="{{ route('dates.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="date" class="form-label">Date *</label>
                        <input type="date" 
                               id="date" 
                               name="date" 
                               value="{{ old('date') }}"
                               class="form-input @error('date') border-red-500 @enderror" 
                               required>
                        @error('date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="time" class="form-label">Time</label>
                        <input type="time" 
                               id="time" 
                               name="time" 
                               value="{{ old('time') }}"
                               class="form-input @error('time') border-red-500 @enderror">
                        @error('time')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}"
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
                              placeholder="Add a description...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="btn-primary">
                        Create Date
                    </button>
                    <a href="{{ route('dates.index') }}" class="link-button">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>