<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = ['title','body'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function reviewable()
    {
    	return $this->morphTo();
    }
}
