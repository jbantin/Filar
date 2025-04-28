<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Tasks;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Welcome extends Component
{
    #[Validate('required|string')]
    public string $title;

    #[Validate('required|string')]
    public string $description;
    
    public function addTask()
    {
        $this->validate();

        Tasks::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'description' => $this->description,
        ]);
        $this->reset();
    }

    public function updateStatus($taskId, $status)
    {
        $task = Tasks::find($taskId);
    
        if ($task && $task->user_id == auth()->id()) {
            $task->status = $status;
            $task->save();
        }
    }

    public function deleteTask($taskId)
    {
        $task = Tasks::find($taskId);
    
        if ($task && $task->user_id == auth()->id()) {
            $task->delete();
        }
    }
    public function render()
    {
        $userId = auth()->id();
        $tasks = $userId ? Tasks::where('user_id', $userId)->get() :collect([]);

        return view('livewire.welcome', [
        'tasks' => $tasks
        ]);
    }
}