<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\View\Support\SortTable;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
  use WithPagination;
  use SortTable;

  public function sortBy(): string
  {
    switch ($this->sortBy) {
      case '0':
        return 'created_at';
        break;
      case '1':
        return 'updated_at';
        break;
      case '2':
        return 'name';
        break;
    }
  }

  public function getUsersProperty()
  {
    return User::orderBy($this->sortBy(), $this->sortType)->paginate(10);
  }
  public function render()
  {
    return view('livewire.admin.user-list');
  }
}
