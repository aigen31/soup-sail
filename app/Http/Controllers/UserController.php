<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hamcrest\Type\IsBoolean;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public static function getRole() : string {
      $role = Auth::user()->role->name;
      
      $lowerCase = Str::lower($role);

      $spacesToDash = Str::replace(' ', '_', $lowerCase);

      return $spacesToDash;
    }

    public static function hasPrivilegy(string $name) : bool {
      $privileges = Auth::user()->role->privileges->attributesToArray();

      return array_key_exists($name, $privileges);
    }

    public static function getByRole(int $roleId) : Collection {
      return User::where('user_role_id', $roleId)->get();
    }
}
