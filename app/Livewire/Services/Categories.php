<?php

namespace App\Livewire\Services;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;

class Categories extends Component
{
  public $parentId;

  public function getCategoriesProperty()
  {
    return ServiceCategory::where('parent_category_id', $this->parentId)->get();
  }

  public function getServicesProperty()
  {
    if (!empty($this->parentId)) {
      return ServiceCategory::find($this->parentId)->services()->get();
    } 
  }

  public function render()
  {
    return view('livewire.services.categories');
  }
}
