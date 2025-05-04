<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

	protected $fillable = ['button1', 'button2', 'title', 'description', 'liste1', 'liste2', 'liste3', 'liste4', 'liste5', 'imageUrl'];
}
