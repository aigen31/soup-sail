<?php

namespace App\Livewire;

use App\View\Components\Layers\ControlLayout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notifications extends Component
{
  public function mount() {
    // dd($this->notifications);
  }
  public function getNotificationsProperty()
  {
    return Auth::user()->notifications;
  }

  public function render()
  {
    return view('livewire.notifications')->layout(ControlLayout::class);
  }
}
