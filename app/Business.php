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

	public $appends = ['contactsParsed', 'urlsParsed', 'emailsParsed'];

    public function user()
    {
    	return $this->belongsTo('App\User');
	}

    public function getContactsParsedAttribute()
    {
        return is_array($this->contacts) ? $this->contacts : (array) json_decode($this->contacts);
	}

	public function getUrlsParsedAttribute()
    {
        return is_array($this->urls) ? $this->urls : (array) json_decode($this->urls);
	}

	public function getEmailsParsedAttribute()
    {
        return is_array($this->emails) ? $this->emails : (array) json_decode($this->emails);
    }
}
