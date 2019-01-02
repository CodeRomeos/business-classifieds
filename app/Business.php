<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
	use SoftDeletes;

    protected $fillable = ['businessid', 'user_id', 'title', 'body', 'image', 'contacts', 'city', 'urls', 'address', 'emails'];

    protected $casts = [
        'emails' => 'array',
        'urls' => 'array',
        'contacts' => 'array',
        'highlights' => 'array'
	];

	public $appends = ['contactsParsed', 'urlsParsed', 'emailsParsed', 'highlightsParsed'];

    public function user()
    {
    	return $this->belongsTo('App\User');
	}

	public function cities()
	{
		return $this->belongsToMany('App\City', 'business_city')->withTimestamps();
	}

	public function services()
	{
		return $this->hasMany('App\Service');
	}

	public function products()
	{
		return $this->hasMany('App\Product');
	}

    public function getContactsParsedAttribute()
    {
        return is_array($this->contacts) ? $this->contacts : (array) json_decode($this->contacts);
	}

	public function getHighlightsParsedAttribute()
    {
        return is_array($this->highlights) ? $this->highlights : (array) json_decode($this->highlights);
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
