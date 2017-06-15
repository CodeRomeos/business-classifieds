<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = ['name', 'body', 'image', 'phone', 'city', 'address', 'email'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Category', 'business_category');
    }

    public function reviews()
    {
    	return $this->morphMany('App\Review', 'reviewable');
    }
}
