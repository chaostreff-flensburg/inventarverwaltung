<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itementity;

class InventoryController extends Controller
{
    //
    public function index()
    {
        $items = Itementity::join('items', 'itementities.item_id', 'items.id')
                            ->join('storagelocations', 'itementities.storagelocation_id', 'storagelocations.id')
                            ->select('itementities.*', 'items.name as itemname', 'storagelocations.name as storagename')
                            ->get();
        return view('inventory.index', compact('items'));
    }
}
