<?php

namespace App\Livewire\Project;

use App\View\Support\SortTable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\View\Support\Content\Description;
use Livewire\WithPagination;

class ProjectList extends Component
{
  use SortTable;
  use WithPagination;

  public function sortBy(): string {
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

  public function getProjectsProperty()
  {
    $projects = Auth::user()->projects()->orderBy($this->sortBy(), $this->sortType)->paginate(10);

    foreach ($projects as $item) {
      $item->description = Description::shortString($item->description);
    }

    return $projects;
  }

  public function render()
  {
    return view('livewire.project.project-list');
  }
}
