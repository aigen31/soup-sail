<?php

namespace App\Livewire\Project;

use App\Http\Controllers\ProjectController;
use App\View\Components\Layers\ControlLayout;
use App\View\Support\Validate\CounterInput;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProject extends Component
{
  use CounterInput;
  public $name;
  public $description;
  public $projectId;

  public function mount()
  {
    $this->projectId = 0;

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
  }

  public function createProject()
  {
    $this->validate([
      "name" => "required|min:{$this->rules['name']['minlength']}|max:{$this->rules['name']['maxlength']}",
      "description" => "required|min:{$this->rules['description']['minlength']}|max:{$this->rules['description']['maxlength']}",
    ]);

    $args = [
      'name' => $this->name,
      'description' => $this->description
    ];

    $this->projectId = ProjectController::create($args);

    $this->dispatch('project-created');
  }

  public function render()
  {
    return view('livewire.project.create-project')->layout(ControlLayout::class);
  }
}
