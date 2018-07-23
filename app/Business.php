<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = ['businessid', 'user_id', 'title', 'body', 'image', 'contacts', 'city', 'urls', 'address', 'emails'];

    protected $casts = [
        'emails' => 'array',
        'urls' => 'array',
        'contacts' => 'array'
    ];

    public function user()
    {
    	return $this->hasMany('App\User');
    }
}
