<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phoneslider extends Model
{
    use HasFactory;

	protected $fillable = ['imageUrl', 'alt'];
}
