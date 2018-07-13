<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'role_id', 'name', 'email', 'password', 'about', 'image', 'mobile', 'street', 'pincode', 'city', 'state', 'social_links'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
	];

	public function role()
    {
    	return $this->belongsTo('App\Role');
    }

    public function hasRole($role)
    {
    	return !! ($this->role->name == $role);
	}

	public function getIsAdminAttribute()
    {
    	return !! ($this->hasRole('administrator'));
	}

	public function getIsAdvertiserAttribute()
    {
    	return !! ($this->hasRole('advertiser'));
	}

	public function getIsSubscriberAttribute()
    {
    	return !! ($this->hasRole('subscriber'));
    }

}
