<div class="mt-8 w-full flex justify-center">
<x-card title="login">
       
    <form wire:submit="login" class="space-y-4">   
        <div>
            <label for="email" class="form-label">Email: </label>
            <input type="email" id="email" wire:model="email" class="form-input">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <div>
            <label for="password" class="form-label">Password: </label>
            <input type="password" id="password" wire:model="password" class="form-input">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <button class="btn-primary" type="submit">Login</button>
    </form>

</x-card>
</div>