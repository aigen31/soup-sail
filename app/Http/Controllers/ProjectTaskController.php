<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectTaskController extends Controller
{
  public static function create(array $args, int $projectId) : void
  {
    Auth::user()->project()->find($projectId)->tasks()->create($args);
  }

  public static function update(array $args, array $matches, int $projectId) : void
  {
    // Auth::user()->project()->find($matches['id'])->update(
    //   $args,
    // );

    Auth::user()->project()->find($projectId)->tasks()->find($matches['id'])->update($args);
  }
}
