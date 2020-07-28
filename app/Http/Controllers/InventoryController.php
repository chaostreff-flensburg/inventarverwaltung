<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itementity;

class InventoryController extends Controller
{
    //
    public function index()
    {
        $items = Itementity::get();
        return view('inventory.index', compact('items'));
    }
}
