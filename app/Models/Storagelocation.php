<?php

namespace App\Models;

use App\Models\Itementity;
use Illuminate\Database\Eloquent\Model;

class Storagelocation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public function itementities()
    {
        return $this->hasMany(Itementity::class);
    }
}
