<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'hash1_id', 'hash2_id', 'hash3_id'
    ];
}
