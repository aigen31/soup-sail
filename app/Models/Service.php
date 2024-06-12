<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
	use HasFactory;

	public function image(): HasOne
	{
		return $this->hasOne(Image::class)->ofMany('id', 'max');
	}

	public function images(): HasMany
	{
		return $this->hasMany(Image::class);
	}

  public function categories() : BelongsTo
  {
    return $this->belongsTo(ServiceCategory::class, 'service_category_id');
  }

  public function user(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'specialist_services');
  }
}
