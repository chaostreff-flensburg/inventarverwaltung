<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function entitys()
    {
        return $this->hasMany('App\Itementity');
    }
}
