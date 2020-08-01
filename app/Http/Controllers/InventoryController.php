<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Itementity;
use App\Models\Item;
use App\Models\People;
use App\Models\Storagelocation;
use App\Models\Tag;

class InventoryController extends Controller
{
    //
    public function index(Request $request)
    {   
        $query = Itementity::with(['item', 'storagelocation', 'image', 'tags']);

        $search = "";
        if ($request->has('search') && is_string($request->search)) {
            $search = $request->search;
            $query->where(static function($query) use ($search) {
                $query->orWhere('identifier', 'LIKE', '%'.$search.'%');
                $query->orWhereHas('storagelocation', static function($query) use ($search) {
                    return $query->where('name', 'LIKE', '%'.$search.'%');
                });
                $query->orWhereHas('item', static function($query) use ($search) {
                    return $query->where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('description', 'LIKE', '%'.$search.'%');
                });
            });
        }

        // tags
        $selectedTags = collect([]);
        $selectedTagIds = [];
        if ($request->has('tag') && is_array($request->tag)) {
            $selectedTags = Tag::whereIn('id', $request->tag)->get();
            $selectedTagIds = $selectedTags->pluck('id')->toArray();

            $query->whereHas('tags', static function($query) use ($request) {
                return $query->whereIn('tag_id', $request->tag);
            });
        }

        // storagelocations
        $selectedLocations = collect([]);
        $selectedLocationIds = [];
        if ($request->has('location') && is_array($request->location)) {
            $selectedLocations = Storagelocation::whereIn('id', $request->location)->get();
            $selectedLocationIds = $selectedLocations->pluck('id')->toArray();

            $query->whereHas('storagelocation', static function($query) use ($request) {
                return $query->whereIn('storagelocation_id', $request->location);
            });
        }

        $itemEntities = $query->get();

        return view('inventory.index', compact('itemEntities', 'selectedTags', 'search', 'selectedTagIds', 'selectedLocations', 'selectedLocationIds'));
    }

    public function createItemForm()
    {
        return view('inventory.createItemForm');
    }

    public function createItem(Request $request)
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
        return redirect(route('ItemList'))->with('status', __('app.done'));
    }

    public function createItementityForm()
    {
        return view('inventory.createItementityForm');
    }

    public function createItementity(Request $request)
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
        $item = new People();
        $item->name = $request->name;
        if(isset($request->contact_info))
            $item->contact_info = $request->contact_info;
        // Redirect to PeopleList with done msg
        return redirect(route('PeopleList'))->with('status', __('app.done'));
    }

    public function createPeopleForm()
    {
        return view('inventory.createPeopleForm');
    }

    public function createPeople(Request $request)
    {
        // Validate Stuff
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:people|max:191',
            'contact_info' => 'nullable',
        ]);
        // onError
        if ($validator->fails()) {
            return redirect(route('createPeople'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create new Item
        $item = new People();
        $item->name = $request->name;
        if(isset($request->contact_info))
            $item->contact_info = $request->contact_info;
        // Redirect to PeopleList with done msg
        return redirect(route('PeopleList'))->with('status', __('app.done'));
    }

}
