<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $timestamps = false;

    protected $table = 'files';

    protected $fillable = [
        'name', 'description', 'file'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
