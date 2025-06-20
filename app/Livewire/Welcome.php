<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Tasks;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Dates;
use Illuminate\Support\Facades\Auth;

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
        $dates = null;
        if (Auth::check()) {
            $dates = Auth::user()->dates()->orderBy('date', 'desc')->get();
        }

        return view('livewire.welcome', [
            'tasks' => Auth::check() ? Auth::user()->tasks : collect(),
            'dates' => $dates
        ]);
    }
}
