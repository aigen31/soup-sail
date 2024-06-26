<?php

namespace App\Livewire\Admin\Users;

use App\Http\Controllers\Specialist\InviteController;
use App\Http\Controllers\Specialist\SpecialistController;
use App\Models\ProjectTask;
use App\Models\SpecialistType;
use App\View\Components\Layers\ControlLayout;
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

  public function invite($userId) {
    InviteController::inviteSpecialist($userId, $this->taskId);
  }

  public function inviteAll() {
    $invite = InviteController::inviteAll($this->specialistList, $this->taskId);

    $this->dispatch($invite->getData()->status);
  }

  public function getSpecialists()
  {
    $this->specialistList = SpecialistController::getByFilter([
      'status' => 1,
      'type' => $this->specialistType,
    ]);

    return $this->specialistList->toArray();
  }

  public function isInvited(int $userId) {
    return InviteController::isInvited($userId, $this->taskId);
  }

  public function render()
  {
    return view('livewire.admin.users.user-task')->layout(ControlLayout::class);
  }
}
