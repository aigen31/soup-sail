<?php

use App\Http\Middleware\Privileges\CanCreateTasksAccess;
use App\Http\Middleware\Privileges\CanOrderServiceAccess;
use App\Http\Middleware\UserAuthentification;
use App\Http\Middleware\UserRoleControlRedirect;
use App\Http\Middleware\Privileges\WalletAccess;
use App\Livewire\Admin\Users\Show as Users;
use App\Livewire\Admin\Users\UserCompany;
use App\Livewire\Admin\Users\UserProject;
use App\Livewire\Admin\Users\UserProjects;
use App\Livewire\Admin\Users\UserTransactions;
use App\Livewire\Admin\Users\UserUpdateProject;
use App\Livewire\Admin\Users\UserUpdateTask;
use App\Livewire\Cart;
use App\Livewire\Company\Show as Company;
use App\Livewire\ControlPanel;
use App\Livewire\Home;
use App\Livewire\Project\CreateProject;
use App\Livewire\Project\Project;
use App\Livewire\Project\Show as ProjectList;
use App\Livewire\Project\Task\CreateTask;
use App\Livewire\Project\Task\UpdateTask;
use App\Livewire\Project\UpdateProject;
use App\Livewire\Services\Service;
use App\Livewire\Services\Show as Services;
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
});

Route::middleware([
  'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
  'admin',
])->group(function () {
  Route::get('/control/users', Users::class)->name('users');
  Route::get('/control/users/{userId}/transactions', UserTransactions::class)->name('user-transactions');
  Route::get('/control/users/{userId}/company', UserCompany::class)->name('user-company');
  Route::get('/control/users/{userId}/projects', UserProjects::class)->name('user-projects');
  Route::get('/control/users/project/{projectId}', UserProject::class)->name('user-project');
  Route::get('/control/users/project/{projectId}/update', UserUpdateProject::class)->name('user-update-project');
  Route::get('/control/users/task/{taskId}/update', UserUpdateTask::class)->name('user-update-task');
});

Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified',
  'business-owner'
])->group(function () {
	Route::get('/control/wallet', Wallet::class)->name('wallet');
	Route::get('/control/services/{parentId?}', Services::class)->name('services');
	Route::get('/control/services/service/{serviceId}', Service::class)->name('service');
	Route::get('/control/transactions', Transactions::class)->name('transactions');
	Route::get('/control/cart', Cart::class)->name('cart');
  Route::get('/control/company', Company::class)->name('company');
	Route::get('/control/project/{projectId}', Project::class)->name('project');
	Route::get('/control/project/{projectId}/update', UpdateProject::class)->name('update-project');
	Route::get('/control/projects', ProjectList::class)->name('projects');
	Route::get('/control/projects/create', CreateProject::class)->name('create-project');
	Route::get('/control/project/{projectId}/task/{taskId}/update', UpdateTask::class)->name('update-task');
	Route::get('/control/project/{projectId}/task/create', CreateTask::class)->name('create-task');
});
