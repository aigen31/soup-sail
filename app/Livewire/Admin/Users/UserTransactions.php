<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use App\View\Components\Layers\ControlLayout;
use App\View\Support\SortTable;
use Livewire\Component;
use Livewire\WithPagination;

class UserTransactions extends Component
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
        return 'amount';
        break;
    }
  }

  public function getTransactionsProperty()
  {
    return User::find($this->userId)->transactions()->orderBy($this->sortBy(), $this->sortType)->paginate(10);
  }
  public function render()
  {
    return view('livewire.admin.users.user-transactions')->layout(ControlLayout::class);
  }
}
