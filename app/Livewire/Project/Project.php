<?php

namespace App\Livewire\Project;

use App\View\Components\Layers\ControlLayout;
use App\View\Support\Content\Description;
use App\View\Support\SortTable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Project extends Component
{
  use SortTable;
  public $projectId;

  public function sortBy(): string
  {
    switch ($this->sortBy) {
      case '0':
        return 'created_at';
        break;
      case '1':
        return 'updated_at';
        break;
      case '2':
        return 'name';
        break;
    }
  }

  public function getProjectProperty()
  {
    return Auth::user()->project()->find($this->projectId);
  }

  public function getTasksProperty()
  {
    $tasks = Auth::user()->project()->find($this->projectId)->tasks()->orderBy($this->sortBy(), $this->sortType)->paginate(10);

    foreach ($tasks as $item) {
      $item->description = Description::shortString($item->description);
    }

    return $tasks;
  }

  public function render()
  {
    return view('livewire.project.project')->layout(ControlLayout::class);
  }
}
