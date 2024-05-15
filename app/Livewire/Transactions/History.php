<?php

namespace App\Livewire\Transactions;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
	public function mount()
	{
		// dd(Auth::user()->transactions);
	}
	public function render()
	{
		return view('livewire.transactions.history');
	}
}
