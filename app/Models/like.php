<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
    protected $fillable = [
	    'blog_id',
	    'like',
	    'unlike',
	    'user_id',
	];
}
