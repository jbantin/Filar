<x-card title="login">

    <h2 class="text-2xl font-bold mb-4">Login</h2>
    
    <form wire:submit="login" class="space-y-4">   
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email: </label>
            <input type="email" id="email" wire:model="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password: </label>
            <input type="password" id="password" wire:model="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition" type="submit">Login</button>
    </form>

</x-card>
