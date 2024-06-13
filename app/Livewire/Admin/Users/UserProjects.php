<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use App\View\Components\Layers\ControlLayout;
use App\View\Support\SortTable;
use Livewire\Component;
use Livewire\WithPagination;

class UserProjects extends Component
{
  use WithPagination;
  use SortTable;
  public $userId;

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

  public function getProjectsProperty()
  {
    return User::find($this->userId)->projects()->orderBy($this->sortBy(), $this->sortType)->paginate(10);
  }

  public function render()
  {
    return view('livewire.admin.users.user-projects')->layout(ControlLayout::class);
  }
}
