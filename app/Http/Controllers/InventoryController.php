<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itementity;
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

        $itemEntities = $query->paginate(2);

        return view('inventory.index', compact('itemEntities', 'selectedTags', 'search', 'selectedTagIds', 'selectedLocations', 'selectedLocationIds'));
    }

}
