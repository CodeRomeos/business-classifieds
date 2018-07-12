<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
    	return $this->hasMany('App\User');
    }

	public function scopeByName($query, $name)
    {
    	return $query->where('name', $name);
    }
}
