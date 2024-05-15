<?php

namespace App\Livewire\Company;

use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.company.show')->layout(ControlLayout::class);
    }
}
