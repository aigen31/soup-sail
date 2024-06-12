<?php

namespace App\Livewire\Services;

use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class Show extends Component
{
  public $parentId;

  public function render()
  {
    return view('livewire.services.show')->layout(ControlLayout::class);
  }
}
