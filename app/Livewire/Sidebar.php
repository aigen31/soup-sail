<?php

namespace App\Livewire;

use App\Traits\PrivilegiesTrait;
use Livewire\Component;

class Sidebar extends Component
{
  use PrivilegiesTrait;

  public function render()
  {
    return view('livewire.sidebar');
  }
}
