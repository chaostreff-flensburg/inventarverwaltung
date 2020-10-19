<?php

namespace App\Models;

use App\Models\Itementity;
use Illuminate\Database\Eloquent\Model;

class Storagelocation extends Model
{
    public function itementities()
    {
        return $this->hasMany(Itementity::class);
    }
}
