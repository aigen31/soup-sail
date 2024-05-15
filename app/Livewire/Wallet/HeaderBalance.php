<?php

namespace App\Livewire\Wallet;

use Livewire\Attributes\On;
use Livewire\Component;

class HeaderBalance extends Component
{
	#[On('fill-deposit')]
	public function render()
	{
		return view('livewire.wallet.header-balance');
	}
}
