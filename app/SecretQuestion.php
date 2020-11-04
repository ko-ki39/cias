<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecretQuestion extends Model
{
    // public function getQuestionContentsAttribute($value){
    //     // return Crypt::decrypt($value);
    //     return ucfirst($value);
    // }

    // public function setQuestionContentsAttribute($value){
    //     // return Crypt::decrypt($value);
    //     return ucfirst($value);
    // }

    public function users(){
        return $this->hasMany(User::class);
    }
}
