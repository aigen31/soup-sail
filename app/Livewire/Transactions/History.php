<?php

namespace App\Livewire\Transactions;

use App\View\Support\SortTable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
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
        return 'amount';
        break;
    }
  }

  public function getTransactionsProperty()
  {
    return Auth::user()->transactions()->orderBy($this->sortBy(), $this->sortType)->paginate(10);
  }


  public function render()
  {
    return view('livewire.transactions.history');
  }
}
