<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectTask extends Model
{
  protected $fillable = ['name', 'description'];

  use HasFactory;

  public function status(): BelongsTo
  {
    return $this->belongsTo(ProjectTaskStatus::class, 'status_id');
  }

  public function user(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'specialist_tasks');
  }
}
