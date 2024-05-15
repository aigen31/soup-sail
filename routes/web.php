<?php

use App\Http\Middleware\UserAuthentification;
use App\Http\Middleware\UserRoleControlRedirect;
use App\Http\Middleware\WalletAccess;
use App\Livewire\Company\Show as Company;
use App\Livewire\ControlPanel;
use App\Livewire\Home;
use App\Livewire\Solutions;
use App\Livewire\Transactions\Show as Transactions;
use App\Livewire\Wallet\Show as Wallet;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
])->group(function () {
	Route::get('/dashboard', function () {
		return view('dashboard');
	})->name('dashboard');
	Route::get('/control', ControlPanel::class)->name('control');
	Route::get('/control/solutions', Solutions::class)->name('solutions');
	Route::get('/control/company', Company::class)->name('company');
});

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
	WalletAccess::class
])->group(function () {
	Route::get('/control/wallet', Wallet::class)->name('wallet');
	Route::get('/control/transactions', Transactions::class)->name('transactions');
});
