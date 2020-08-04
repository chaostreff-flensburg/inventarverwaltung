<?php

namespace App\Http\Controllers;

use App\Models\Itementity;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItementityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itementity.edit');
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
            'identifier' => 'required|unique:itementities|max:191',
            'item_id' => 'required|exists:App\Models\Item,id',
            'consumable' => 'required|boolean',
            'amount' => 'numeric|nullable',
            'storagelocation_id' => 'required|exists:App\Models\Storagelocation,id',
            'image_id' => 'nullable|exists:App\Models\Image,id'
        ]);
        // onError
        if ($validator->fails()) {
            return redirect(route('createItementity'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create new Item
        // todo:save itementity

        // Redirect to Inventorylist with done msg
        return redirect(route('inventory.index'))->with('status', __('app.done'));    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Itementity  $entity
     * @return \Illuminate\Http\Response
     */
    public function show(Itementity $entity)
    {
        return view('itementity.show', ['item' => $entity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Itementity  $entity
     * @return \Illuminate\Http\Response
     */
    public function edit(Itementity $entity)
    {
        return view('itementity.edit', ['item' => $entity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Itementity  $entity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itementity $entity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Itementity  $entity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itementity $entity)
    {
        //
    }
}
