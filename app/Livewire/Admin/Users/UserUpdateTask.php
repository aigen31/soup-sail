<?php

namespace App\Livewire\Admin\Users;

use App\Http\Controllers\ProjectTaskController;
use App\Models\ProjectTask;
use App\View\Components\Layers\ControlLayout;
use App\View\Support\Validate\CounterInput;
use Livewire\Component;

class UserUpdateTask extends Component
{
  use CounterInput;
  public $taskId;
  public $args;
  public $name;
  public $description;

  public function mount()
  {
    $this->name = $this->task->name;
    $this->description = $this->task->description;

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

    $this->args = [
      'id' => $this->taskId,
    ];
  }

  public function updateProject()
  {
    $this->validate(
      [
        "name" => "required|min:{$this->rules['name']['minlength']}|max:{$this->rules['name']['maxlength']}",
        "description" => "required|min:{$this->rules['description']['minlength']}|max:{$this->rules['description']['maxlength']}",
      ],
    );

    $args = [
      'name' => $this->name,
      'description' => $this->description,
    ];

    ProjectTaskController::update($args, $this->args, $this->projectId);

    $this->dispatch('saved');
  }

  public function getTaskProperty()
  {
    return ProjectTask::find($this->taskId);
  }

  public function render()
  {
    return view('livewire.admin.users.user-update-task')->layout(ControlLayout::class);
  }
}
