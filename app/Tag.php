<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function itementitys()
    {
        return $this->belongsToMany('App\Itementity', 'Tag_Itementity');
    }
}
