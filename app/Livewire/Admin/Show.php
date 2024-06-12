<?php

namespace App\Livewire\Admin;

use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.admin.show')->layout(ControlLayout::class);
    }
}
