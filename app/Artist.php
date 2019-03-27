<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artist_users';

    protected $fillable = [
        'street_number', 'street', 'postcode', 'rating',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function favored()
    {
        return $this->belongsToMany('App\User', 'user_favorites');
    }

    public function rated()
    {
        return $this->belongsToMany('App\User', 'user_rating')->withPivot('rating');
    }
}
