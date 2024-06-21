<?php

namespace App\Livewire\Admin\Users;

use App\Http\Controllers\Specialist\SpecialistController;
use App\Models\ProjectTask;
use App\Models\SpecialistType;
use App\Models\User;
use App\Notifications\Users\Specialist\RequestWorkTask;
use App\View\Components\Layers\ControlLayout;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class UserTask extends Component
{
  public $taskId;
  public $specialistType;
  public $specialistList;

  public function mount()
  {
    $this->specialistType = "1";
  }

  public function getTaskProperty()
  {
    return ProjectTask::find($this->taskId);
  }

  public function getSpecialistTypesProperty()
  {
    return SpecialistType::all();
  }

  public function getSpecialists()
  {
    // $this->specialistList = SpecialistController::getByType($this->specialistType);
    $this->specialistList = SpecialistController::getByFilter([
      'status' => 1,
      'type' => $this->specialistType,
    ]);

    return $this->specialistList->toArray();
  }

  public function inviteSpecialist($id)
  {
    $invoice = [
      'taskName' => $this->task->name,
      'taskId' => $this->taskId,
    ];

    Notification::send(User::find($id), new RequestWorkTask($invoice));
  }

  public function inviteAll()
  {
    $invoice = [
      'taskName' => $this->task->name,
      'taskId' => $this->taskId,
    ];

    Notification::send($this->specialistList, new RequestWorkTask($invoice));

    $this->dispatch('invited');
  }

  public function render()
  {
    return view('livewire.admin.users.user-task')->layout(ControlLayout::class);
  }
}
