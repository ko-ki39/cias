<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'hashtag_contents'
    ];
}
