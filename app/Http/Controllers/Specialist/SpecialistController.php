<?php

namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use App\Models\SpecialistStatus;
use App\Models\SpecialistType;
use Illuminate\Support\Collection;

class SpecialistController extends Controller
{
  public static function getByStatus(int $status) : Collection {
    return SpecialistStatus::find($status)->users;
  }

  public static function getByType(int $type) : Collection {
    return SpecialistType::find($type)->users;
  }

  public static function getByFilter(array $args) : Collection {
    $statusUsers = SpecialistStatus::find($args['status'])->users;
    $typeUsers = SpecialistType::find($args['type'])->users;

    return $statusUsers->intersect($typeUsers);
  }
}
