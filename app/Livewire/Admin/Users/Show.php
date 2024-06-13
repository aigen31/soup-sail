<?php

namespace App\Livewire\Admin\Users;

use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.admin.users.show')->layout(ControlLayout::class);
    }
}
