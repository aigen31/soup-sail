<?php

namespace App\Livewire\Admin\Users;

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use App\Models\User;
use App\View\Components\Layers\ControlLayout;
use App\View\Support\Validate\CounterInput;
use Livewire\Component;

class UserUpdateProject extends Component
{
  use CounterInput;
  public $projectId;
  public $args;
  public $name;
  public $description;

  public function mount()
  {
    $this->name = $this->project->name;
    $this->description = $this->project->description;

    $this->rules = [
      'name' => [
        'minlength' => 3,
        'maxlength' => 30,
      ],
      'description' => [
        'minlength' => 3,
        'maxlength' => 100,
      ],
    ];

    $this->args = [
      'id' => $this->projectId,
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

    ProjectController::update($args, $this->args);

    $this->dispatch('saved');
  }

  public function getProjectProperty()
  {
    return Project::find($this->projectId);
  }

  public function render()
  {
    return view('livewire.admin.users.user-update-project')->layout(ControlLayout::class);
  }
}
