<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itementity;
use App\Models\Item;
use App\Models\People;
use App\Models\Storagelocation;

class TestController extends Controller
{
    //
    public function init()
    {
        // Items
        $item1 = new Item();
        $item1->name = "Laptop";
        $item1->description = "Ein Laptop";
        $item1->save();
        $item2 = new Item();
        $item2->name = "Bagger";
        $item2->description = "Ein Bagger";
        $item2->save();
        // Storage
        $storage1 = new Storagelocation();
        $storage1->name = "Werkstatt";
        $storage1->description = "Die Werkstatt oben";
        $storage1->save();
        // Entity
        $itementity1 = new Itementity();
        $itementity1->item_id = $item1->id;
        $itementity1->identifier = 'ctfl_nr_0001';
        $itementity1->borrowed_by = 0;
        $itementity1->status = 1;
        $itementity1->consumable = 0;
        $itementity1->amount = 0;
        $itementity1->storagelocation_id = $storage1->id;
        $itementity1->save();
        $itementity2 = new Itementity();
        $itementity2->item_id = $item2->id;
        $itementity2->identifier = 'ctfl_nr_0002';
        $itementity2->borrowed_by = 0;
        $itementity2->status = 1;
        $itementity2->consumable = 0;
        $itementity2->amount = 0;
        $itementity2->storagelocation_id = $storage1->id;
        $itementity2->save();
    }
}
