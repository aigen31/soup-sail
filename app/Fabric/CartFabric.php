<?php

namespace App\Fabric;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartFabric
{
  public static function make(int $item) : void {
    Auth::user()->cartItem()->updateOrCreate(
      ['user_id' => Auth::id()],
      ['service_id' => $item]
    );
  }
}
