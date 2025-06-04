<!-- filepath: resources/views/notes/create.blade.php -->
<x-layouts.app>
    <div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Add New Note</h1>
            </div>

            <form action="/notes" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="note" class="form-label">Note *</label>
                    <textarea id="note" 
                              name="note" 
                              rows="10"
                              class="form-input @error('note') border-red-500 @enderror" 
                              placeholder="Write your note here..."
                              required>{{ old('note') }}</textarea>
                    @error('note')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="btn-primary">
                        Create Note
                    </button>
                    <a href="{{ route('notes.index') }}" class="link-button">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>