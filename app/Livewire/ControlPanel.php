<?php

namespace App\Livewire;

use App\View\Components\Layers\ControlLayout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ControlPanel extends Component
{
	public function render()
	{
		return view('livewire.control-panel')->layout(ControlLayout::class);
	}
}
