<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SpecialistType extends Model
{
  use HasFactory;

  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'specialist_type_user', 'type_id', 'user_id');
  }
}
