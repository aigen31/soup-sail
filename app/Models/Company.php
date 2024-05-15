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

		// public function body() : BelongsTo
		// {
		// 	return $this->belongsTo(CompanyBody::class, 'company_body_id');
		// }

		// public function category() : BelongsTo
		// {
		// 	return $this->belongsTo(CompanyCategory::class, 'company_category_id');
		// }

		public function categories() : HasMany
		{
			return $this->hasMany(CompanyCategory::class);
		}

		public function image() : HasOne
		{
			return $this->hasOne(Image::class);
		}

		public function licenses() : HasMany
		{
			return $this->hasMany(License::class);
		}
}
