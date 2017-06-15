<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'body'];

    public function businesses()
    {
    	return $this->belongsToMany('App\Business', 'business_category');
    }
}
