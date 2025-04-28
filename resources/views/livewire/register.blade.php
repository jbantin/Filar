
<div class="mt-8 w-full flex justify-center">
<x-card title="register">
<form wire:submit="save">
    <div>
    <label class="form-label" for="name">Name : </label>
    <input class="form-input" type="text" wire:model='name'>
    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="form-label" for="email">email : </label>
    <input class="form-input" type="email" wire:model='email'>
    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="form-label" for="password">Password : </label>
    <input class="form-input" type="password" wire:model='password'>
    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>
    <button class="btn-primary" type="submit">Submit</button>
    
</form>
</x-card>
</div>