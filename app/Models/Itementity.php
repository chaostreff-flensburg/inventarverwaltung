<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itementity extends Model
{
    //
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_itementity');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storagelocation::class, 'storageloaction_id');
    }
}
