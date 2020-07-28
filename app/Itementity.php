<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itementity extends Model
{
    //
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'Tag_Itementity');
    }

    public function storage()
    {
        return $this->hasOne('App\Storagelocation');
    }
}
