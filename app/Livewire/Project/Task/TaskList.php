<?php

namespace App\Livewire\Project\Task;

use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class TaskList extends Component
{
    public function render()
    {
        return view('livewire.project.task.task-list')->layout(ControlLayout::class);
    }
}
