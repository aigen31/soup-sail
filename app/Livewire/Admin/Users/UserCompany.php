<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class UserCompany extends Component
{
  public $userId;

  public function getCompanyProperty()
  {
    return User::find($this->userId)->company;
  }

  public function render()
  {
    return view('livewire.admin.users.user-company')->layout(ControlLayout::class);
  }
}
