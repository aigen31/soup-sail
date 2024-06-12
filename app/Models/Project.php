<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'description'];

  public function tasks(): HasMany
  {
    return $this->hasMany(ProjectTask::class);
  }

  public function task(): HasOne
  {
    return $this->hasOne(ProjectTask::class);
  }
}
