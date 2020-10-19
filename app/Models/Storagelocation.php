<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storagelocation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
