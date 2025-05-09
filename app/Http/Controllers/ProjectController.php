<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class ProjectController extends Controller
{
  public static function create(array $args) : int
  {
    $task = Auth::user()->project()->create($args);

    return $task->id;
  }

  public static function update(array $args, array $matches)
  {
    Auth::user()->project()->find($matches['id'])->update(
      $args,
    );
  }

  public static function delete()
  {
  }
}
