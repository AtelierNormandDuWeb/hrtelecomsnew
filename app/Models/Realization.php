<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realization extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'slug', 'description', 'moreDescription', 'additionalInfos', 'imageUrls'];

	public function categories()
	{

		return $this->belongsToMany(\App\Models\Category::class);

	}
	public function getImageUrlsAttribute($value)
	{
		return json_decode($value, true);
	}

}
