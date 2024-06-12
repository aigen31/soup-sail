<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

		public function image() : HasOne
		{
			return $this->hasOne(Image::class);
		}

		public function licenses() : HasMany
		{
			return $this->hasMany(License::class);
		}
}
