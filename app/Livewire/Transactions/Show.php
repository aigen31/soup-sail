<?php

namespace App\Livewire\Transactions;

use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.transactions.show')->layout(ControlLayout::class);
    }
}
