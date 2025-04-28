<form wire:submit="save">
    <label for="name">Name : </label>
    <input type="text" wire:model='name'>
    <label for="email">email : </label>
    <input type="email" wire:model='email'>
    <label for="password">Password : </label>
    <input type="password" wire:model='password'>
    <button class="text-green-500 font-bold border rounded-md p-1 hover:bg-gray-100" type="submit">Submit</button>
    
</form>
