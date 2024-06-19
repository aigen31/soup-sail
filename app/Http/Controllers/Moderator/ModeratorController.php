<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public static function getModerators() {
      return User::where('user_role_id', 2)->get();
    }
}
