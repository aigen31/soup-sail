<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectTaskController extends Controller
{
  public static function create(array $args, int $projectId) : int
  {
    $task = Auth::user()->project()->find($projectId)->tasks()->create($args);

    return $task->id;
  }

  public static function update(array $args, array $matches, int $projectId) : void
  {
    Auth::user()->project()->find($projectId)->tasks()->find($matches['id'])->update($args);
  }
}
