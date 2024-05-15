<?php

namespace App\Livewire\Wallet;

use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.wallet.show')->layout(ControlLayout::class);
    }
}
