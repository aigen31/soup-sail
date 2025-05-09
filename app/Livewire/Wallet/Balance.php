<?php

namespace App\Livewire\Wallet;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Balance extends Component
{
	public function deposit()
	{
		$this->user->deposit(1500);
		$this->dispatch('fill-deposit');
	}

	public function getUserProperty()
	{
		return Auth::user();
	}

	public function render()
	{
		return view('livewire.wallet.balance');
	}
}
