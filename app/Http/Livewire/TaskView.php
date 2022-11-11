<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskView extends Component
{
    public function render()
    {
        return view('livewire.task-view');
    }
    public function markasPending($id)
    {
        $task = Task::find($id);
        $task->update([
            'status' => 0 
        ]);
    }
    public function markasCompleted($id)
    {
        $task = Task::find($id);
        $task->update([
            'status' => 1 
        ]);
    }
}
