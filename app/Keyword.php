<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keyword extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'title', 'slug' ];

    public function businesses()
    {
        return $this->morphedByMany('App\Business', 'keywordable');
    }
}
