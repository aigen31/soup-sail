<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class License extends Model
{
	use HasFactory;

	public function image(): HasOne
	{
		return $this->hasOne(Image::class);
	}

	public function images(): HasMany
	{
		return $this->hasMany(Image::class);
	}
}
