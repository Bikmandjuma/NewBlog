<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

	protected $fillable = [
	    'title',
	    'image',
	    'content',
	    'view_count',
	    'like',
	     'user_id'
	];

	public function getLikesId(){
        $this->hasMany('App\Models\like', 'blog_id');
    }
}