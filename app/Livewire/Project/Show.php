<?php

namespace App\Livewire\Project;

use App\View\Components\Layers\ControlLayout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
  public function render()
  {
    return view('livewire.project.show')->layout(ControlLayout::class);
  }
}
