<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public static function getRole() {
      $role = Auth::user()->role->name;
      
      $lowerCase = Str::lower($role);

      $spacesToDash = Str::replace(' ', '_', $lowerCase);

      return $spacesToDash;
    }

    public static function hasPrivilegy(string $name) {
      $privileges = Auth::user()->role->privileges->attributesToArray();

      return array_key_exists($name, $privileges);
    }
}
