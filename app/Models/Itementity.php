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

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public function storagelocation()
    {
        return $this->belongsTo(Storagelocation::class);
    }

    public function getDisplayImageAttribute(): string
    {
        return $this->image ? optional($this->image)->filename : optional($this->item->image)->filename;
    }
}
