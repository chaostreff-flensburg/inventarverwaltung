<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itementity extends Model
{
    public $fillable = [
        'identifier',
        'item_id',
        'consumable',
        'amount',
        'storagelocation_id',
    ];

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

    public function getDisplayStatusAttribute(): string {
        if ($this->consumable != 0) {
            if ($this->amount >= 0) {
                return number_format($this->amount, 0, ',', '.') . " Available";
            }
            return "Not Available";
        }

        switch ($this->status) {
            case 0:
                return "Not Available";
                break;
            case 1:
                return "Available";
                break;
            case 2:
                return "Borrowed";
                break;
            case -1:
                return "Lost";
                break;
                                    
            default:
                return "Unknown";
                break;
        }
    }

}
