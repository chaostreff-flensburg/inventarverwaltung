<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Stuff
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:items|max:191',
            'description' => 'nullable',
            'image_id' => 'nullable|exists:App\Models\Image,id'
        ]);
        // onError
        if ($validator->fails()) {
            return redirect(route('createItem'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create new Item
        $item = new Item;
        $item->name = $request->title;
        if(isset($request->description))
            $item->description = $request->description;
        if(isset($request->image_id))
            $item->image_id = $request->image_id;
        // Redirect to ItemList with done msg
        return redirect(route('inventory.index'))->with('status', __('app.done'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('item.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
