<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'login', 'email', 'password', 'description', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function artist()
    {
        return $this->hasOne('App\Artist');
    }

    public function styles()
    {
        return $this->belongsToMany('App\Style', 'artist_styles');
    }

    public function favorites()
    {
        return $this->belongsToMany(self::class, 'user_favorites', 'user_id', 'artist_id');
    }

    public function rates()
    {
        return $this->belongsToMany(self::class, 'user_rating', 'user_id', 'artist_id')->withPivot('rating');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function favored()
    {
        return $this->belongsToMany(self::class, 'user_favorites', 'artist_id', 'user_id');
    }

    public function rated()
    {
        return $this->belongsToMany(self::class, 'user_rating', 'artist_id', 'user_id')->withPivot('rating');
    }
}
