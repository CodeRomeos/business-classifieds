<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = ['name', 'body', 'image', 'contacts', 'city', 'address', 'emails', 'urls'];

    protected $casts = [
        'emails' => 'array',
        'contacts' => 'array',
        'is_active' => 'boolean',
        'is_approved' => 'boolean',
        'urls' => 'array'
    ];

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

    public function scopeOnlyVerified($q)
    {
        return $q->where('verified_at', '!=', '');
    }

    public function isVerified()
    {
        return !! ($this->verified_at);
    }
}
