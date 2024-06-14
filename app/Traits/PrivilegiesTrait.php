<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait PrivilegiesTrait
{
  public function getPrivilegesProperty(): Model
  {
    return Auth::user()->role->privileges;
  }
}
