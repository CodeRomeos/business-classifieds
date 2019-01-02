<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
	use SoftDeletes;

	protected $appends = ['city_and_state_name'];

    public function state()
	{
		return $this->belongsTo('App\State');
	}

	public function businesses()
	{
		return $this->belongsToMany('App\Business', 'business_city')->withTimestamps();
	}

	public function getCityAndStateNameAttribute()
	{
		return $this->name . ', ' . $this->state->name;
	}
}
