<?php

namespace App\Livewire\Project\Task;

use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class CreateTask extends Component
{
    public function render()
    {
        return view('livewire.project.task.create-task')->layout(ControlLayout::class);
    }
}
