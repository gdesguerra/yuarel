<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'alias', 'long_url', 'user_id'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
