<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\FavDelete;

class Article extends Model
{
    //
    protected $fillable =[
        'user_id', 'title', 'description',
        'image', 'hash1_id', 'hash2_id', 'hash3_id'
    ];

    protected $dispatchesEvents = [
        'deleted' => FavDelete::class
    ];
}
