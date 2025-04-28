
    <div>
        <h1 class="text-5xl font-bold text-black">
            Moin        
        </h1>
                <x-card title="Hi {{Auth::check() ? Auth::user()->name : 'unknown'}}">
        @guest
            <p>Please <a href="/login">login</a> or <a href="/register">register</a></p>
        @endguest                
     </x-card>
     @auth
     <div class="flex flex-col md:flex-row">
        <div>
     <x-card title="Add task">
        
          <form wire:submit="addTask">
         <div>
            <div>
         <label for="title ">Title</label>
         <input type="text" wire:model="title">
         @error('title') 
         <span class="text-red-500 text-sm">{{ $message }}</span> 
         @enderror
        </div>
        <div>
                <label for="description ">description</label>
            <textarea wire:model="description" cols="30" rows="3"></textarea>
           </div>
           @error('description') 
             <span class="text-red-500 text-sm">{{ $message }}</span> 
           @enderror
        </div>
           <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition" type="submit">submit</button>
         </form>
        
        </x-card>
    </div>
    <div class="w-full">
        <div class="grid grid-cols-3 gap-4">
            <!-- Pending Column -->
            <div class="border rounded p-4 bg-gray-50">
                <h2 class="text-lg font-bold mb-4 text-yellow-600">Pending</h2>
                <div class="space-y-3">
                    @foreach ($tasks->where('status', 'pending') as $task)
                        <div class="bg-white p-3 rounded shadow">
                            <h3 class="font-semibold">{{ $task->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $task->description }}</p>
                            <div class="mt-2 flex justify-between">
                                <button wire:click="updateStatus({{ $task->id }}, 'in_progress')" 
                                        class="bg-blue-500 text-white px-2 py-1 rounded text-xs">
                                    Start Task
                                </button>
                                <button wire:click="deleteTask({{ $task->id }})" 
                                    class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                Delete Task
                            </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- In Progress Column -->
            <div class="border rounded p-4 bg-gray-50">
                <h2 class="text-lg font-bold mb-4 text-blue-600">In Progress</h2>
                <div class="space-y-3">
                    @foreach ($tasks->where('status', 'in_progress') as $task)
                        <div class="bg-white p-3 rounded shadow">
                            <h3 class="font-semibold">{{ $task->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $task->description }}</p>
                            <div class="mt-2 flex justify-between">
                                <button wire:click="updateStatus({{ $task->id }}, 'completed')" 
                                        class="bg-green-500 text-white px-2 py-1 rounded text-xs">
                                    Complete Task
                                </button>
                                <button wire:click="deleteTask({{ $task->id }})" 
                                    class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                Delete Task
                            </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Completed Column -->
            <div class="border rounded p-4 bg-gray-50">
                <h2 class="text-lg font-bold mb-4 text-green-600">Completed</h2>
                <div class="space-y-3">
                    @foreach ($tasks->where('status', 'completed') as $task)
                        <div class="bg-white p-3 rounded shadow">
                            <h3 class="font-semibold">{{ $task->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $task->description }}</p>
                            <div class="mt-2 flex justify-between">
                                <button wire:click="updateStatus({{ $task->id }}, 'pending')" 
                                        class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">
                                    Restart Task
                                </button>
                                <button wire:click="deleteTask({{ $task->id }})" 
                                    class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                delete Task
                            </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

     @endauth
    </div>
    