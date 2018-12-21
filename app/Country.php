<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function cities()
	{
		return $this->hasMany('cities', 'App\City');
	}
}
