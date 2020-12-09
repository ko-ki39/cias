<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable =[
        "comment_id", "user_id",
    ];

    // protected $dispatchesEvents = [
    //     'deleted' => FavDelete::class
    // ];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
