<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function stete()
	{
		return $this->belongsTo('App\State');
	}

	public function businesses()
	{
		return $this->belongsToMany('App\Business', 'business_city')->withTimestamps();
	}
}
