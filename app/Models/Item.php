<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    //
    public function entities()
    {
        return $this->hasMany(Itementity::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }
}
