<!-- filepath: /home/sackler/Desktop/projects/php/Filar/resources/views/livewire/welcome.blade.php -->
<div class="px-12">
    <div class="w-full flex justify-center">
        <x-card title="Hi {{Auth::check() ? Auth::user()->name : 'and welcome to Laranban.'}}">
            @guest
                <p class="my-4 font-bold">Please <a class="link-button" href="/login">login</a> or <a class="link-button" href="/register">register</a></p>
                <p class="font-bold">for your tasks,dates and notes.</p>
            @endguest                
        </x-card>
    </div>

    @auth
    
    <!-- Tasks Section -->
    <div class="flex flex-col lg:flex-row">
        <div>
            <x-card title="Add task">
                <form wire:submit="addTask">
                    <div>
                        <div>
                            <label class="form-label" for="title">Title</label>
                            <input class="form-input" type="text" wire:model="title">
                            @error('title') 
                                <span class="text-red-500 text-sm">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div>
                            <label class="form-label" for="description">description</label>
                            <textarea class="form-input" wire:model="description" cols="30" rows="3"></textarea>
                        </div>
                        @error('description') 
                            <span class="text-red-500 text-sm">{{ $message }}</span> 
                        @enderror
                    </div>
                    <button class="btn-primary" type="submit">submit</button>
                </form>
            </x-card>
        </div>

        <div class="w-full px-1">
            <div class="grid md:grid-cols-3 gap-1">
                <x-card>
                    <h2 class="text-lg font-bold mb-4 text-yellow-600">Pending</h2>
                    <div class="space-y-3">
                        @foreach ($tasks->where('status', 'pending') as $task)
                            <div class="bg-white p-3 rounded shadow">
                                <h3 class="font-semibold">{{ $task->title }}</h3>
                                <p class="text-sm text-gray-600 break-words">{{ $task->description }}</p>
                                <div class="mt-2 flex flex-col justify-between md:flex-row">
                                    <button wire:click="updateStatus({{ $task->id }}, 'in_progress')" 
                                            class="btn-primary">
                                        Start
                                    </button>
                                    <button wire:click="deleteTask({{ $task->id }})" 
                                        class="btn-secondary">
                                    Delete
                                </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-card>            
               
                <x-card>
                    <h2 class="text-lg font-bold mb-4 text-blue-600">In Progress</h2>
                    <div class="space-y-3">
                        @foreach ($tasks->where('status', 'in_progress') as $task)
                            <div class="bg-white p-3 rounded shadow">
                                <h3 class="font-semibold">{{ $task->title }}</h3>
                                <p class="text-sm text-gray-600 break-words">{{ $task->description }}</p>
                                <div class="mt-2 flex flex-col justify-between md:flex-row">
                                    <button wire:click="updateStatus({{ $task->id }}, 'completed')" 
                                            class="btn-primary text-xs">
                                        Complete
                                    </button>
                                    <button wire:click="deleteTask({{ $task->id }})" 
                                        class="btn-primary bg-red-500 text-xs">
                                    Delete
                                </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-card>            
                
                <x-card>
                    <h2 class="text-lg font-bold mb-4 text-green-600">Completed</h2>
                    <div class="space-y-3">
                        @foreach ($tasks->where('status', 'completed') as $task)
                            <div class="bg-white p-3 rounded shadow">
                                <h3 class="font-semibold">{{ $task->title }}</h3>
                                <p class="text-sm text-gray-600 break-words">{{ $task->description }}</p>
                                <div class="mt-2 flex flex-col justify-between md:flex-row">
                                    <button wire:click="updateStatus({{ $task->id }}, 'pending')" 
                                            class="btn-primary text-xs">
                                        Restart
                                    </button>
                                    <button wire:click="deleteTask({{ $task->id }})" 
                                        class="btn-primary bg-red-500 text-xs">
                                    delete
                                </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-card>
            </div>
        </div>
    </div>
   

    @endauth
</div>