<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    public $timestamps = false;

    protected $table = 'styles';

    protected $fillable = [
        'style',
    ];

    public function artists()
    {
        return $this->belongsToMany('App\User', 'artist_styles');
    }
}
