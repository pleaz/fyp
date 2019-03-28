<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    protected $table = 'city';

    protected $fillable = [
        'city',
    ];

    public function artists()
    {
        return $this->hasMany('App\Artist');
    }
}
