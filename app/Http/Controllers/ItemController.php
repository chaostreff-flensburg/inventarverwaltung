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
            'name' => 'required|unique:items|max:191',
            'description' => 'nullable',
            'image_id' => 'nullable|exists:App\Models\Image,id'
        ]);

        // onError
        if ($validator->fails()) {
            return redirect(route('items.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create new Item
        $item = new Item($request->all());
        $item->save();

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
        // Validate Stuff
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:items|max:191',
            'description' => 'nullable',
            'image_id' => 'nullable|exists:App\Models\Image,id'
        ]);

        // onError
        if ($validator->fails()) {
            return redirect(route('items.update'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create new Item
        $item->name = $request->get('name');
        $item->description = $request->get('description');
        $item->save();

        return redirect(route('inventory.index'))->with('status', __('app.done'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->entities()->delete();
        $item->delete();

        return back()->withInput()->with('status', __('app.done'));
    }

}
