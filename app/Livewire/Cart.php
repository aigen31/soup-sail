<?php

namespace App\Livewire;

use App\Http\Controllers\Moderator\ModeratorController;
use App\Http\Controllers\ProjectTaskController;
use App\Models\Project;
use App\Notifications\NewClientTaskNotification;
use App\View\Components\Layers\ControlLayout;
use App\View\Support\Validate\CounterInput;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Exceptions\InsufficientFunds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Cart extends Component
{
  use CounterInput;
  public $projectId;
  public $name;
  public $description;

  public function mount()
  {
    if (count($this->projects) !== 0) {
      $this->projectId = $this->projects->first()->id;
    }

    $this->rules = [
      'name' => [
        'minlength' => 3,
        'maxlength' => 30,
      ],
      'description' => [
        'minlength' => 3,
        'maxlength' => 2000,
      ],
    ];
  }
  
  public function addTask()
  {
    $users = ModeratorController::getModerators();

    $this->validate(
      [
        "name" => "required|min:{$this->rules['name']['minlength']}|max:{$this->rules['name']['maxlength']}",
        "description" => "required|min:{$this->rules['description']['minlength']}|max:{$this->rules['description']['maxlength']}",
      ],
    );
    
    try {
      Auth::user()->withdraw($this->service->price);
    } catch (BalanceIsEmpty $ex) {
      $this->addError('balance-error', $ex->getMessage());
      return $ex;
    } catch (InsufficientFunds $ex) {
      $this->addError('balance-error', $ex->getMessage());
      return $ex;
    }

    $args = [
      'name' => $this->name,
      'description' => $this->description,
    ];

    $taskId = ProjectTaskController::create($args, $this->projectId);

    $invoice = [
      'taskName' => $this->name,
      'taskId' => $taskId,
    ];

    Notification::send($users, new NewClientTaskNotification($invoice));

    return redirect()->route('project', $this->projectId);
  }
  public function getItemProperty()
  {
    return Auth::user()->cartItem()->firstOrFail();
  }
  public function getServiceProperty()
  {
    return Auth::user()->service()->firstOrFail();
  }
  public function getProjectsProperty()
  {
    return Auth::user()->projects()->get();
  }
  public function render()
  {
    return view('livewire.cart')->layout(ControlLayout::class);
  }
}
