<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table = 'styles';

    protected $fillable = [
        'style',
    ];

    public function artists()
    {
        return $this->belongsToMany('App\User', 'artist_styles');
    }
}
