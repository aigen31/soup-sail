<?php

namespace App\Livewire\Services;

use App\Http\Controllers\CartController;
use App\Models\Service as ModelsService;
use App\View\Components\Layers\ControlLayout;
use Livewire\Component;

class Service extends Component
{
  public $serviceId;

  public function makeOrder()
  {
    CartController::create($this->serviceId);

    return redirect()->route('cart');
  }

  public function getServiceProperty()
  {
    return ModelsService::findOrFail($this->serviceId);
  }

  public function render()
  {
    return view('livewire.services.service')->layout(ControlLayout::class);
  }
}
