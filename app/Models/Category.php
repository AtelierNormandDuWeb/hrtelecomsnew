<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

	protected $fillable = ['name', 'slug', 'description', 'imageUrl'];

	public function realizations()
	{
		
		return $this->belongsToMany(\App\Models\Realization::class);
	
	}

}
