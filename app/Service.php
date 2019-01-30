<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
	use SoftDeletes;

	protected $fillable = ['name', 'description', 'image'];

	public function business()
	{
		return $this->belongsTo('App\Business');
	}
}
