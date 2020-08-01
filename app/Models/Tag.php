<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function itementitys()
    {
        return $this->belongsToMany(Itementity::class, 'tag_itementity');
    }
}
