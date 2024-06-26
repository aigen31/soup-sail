<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public static function create(int $item) : void {
    Auth::user()->cartItem()->updateOrCreate(
      ['user_id' => Auth::id()],
      ['service_id' => $item]
    );
  }
}
