<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Itementity;
use App\Models\Storagelocation;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $search = "";
    public $tag;
    public $location;
    public $selectedIds = [];

    protected $updatesQueryString = ['search', 'tag', 'location'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->tag = request()->query('tag', $this->tag);
        $this->location = request()->query('location', $this->location);

        if (!is_array($this->tag)) {
            $this->tag = [];
        }
        if (!is_array($this->location)) {
            $this->location = [];
        }
    }

    public function addTag(int $id) {
        $this->tag = array_merge($this->tag, [$id]);
    }

    public function removeTag(int $id) {
        $this->tag = array_diff($this->tag, [$id]);
    }

    public function addLocation(int $id) {
        $this->location = array_merge($this->location, [$id]);
    }

    public function removeLocation(int $id) {
        $this->location = array_diff($this->location, [$id]);
    }

    public function render()
    {
        $query = Itementity::with(['item', 'storagelocation', 'image', 'tags']);

        if (isset($this->search) && is_string($this->search)) {
            $query->where(function($query) {
                $query->orWhere('identifier', 'LIKE', '%'.$this->search.'%');
                $query->orWhereHas('storagelocation', function($query) {
                    return $query->where('name', 'LIKE', '%'.$this->search.'%');
                });
                $query->orWhereHas('item', function($query) {
                    return $query->where('name', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('description', 'LIKE', '%'.$this->search.'%');
                });
            });
        }

        // tags
        $selectedTags = collect([]);
        if (is_array($this->tag) && !empty($this->tag)) {
            $selectedTags = Tag::whereIn('id', $this->tag)->get();

            $query->whereHas('tags', function($query) {
                return $query->whereIn('tag_id', $this->tag);
            });
        }

        // storagelocations
        $selectedLocations = collect([]);
        if (is_array($this->location) && !empty($this->location)) {
            $selectedLocations = Storagelocation::whereIn('id', $this->location)->get();

            $query->whereHas('storagelocation', function($query) {
                return $query->whereIn('storagelocation_id', $this->location);
            });
        }

        $itemEntities = $query->paginate(10);

        $selectedItementities = Itementity::whereIn('id', $this->selectedIds)->get();

        return view('livewire.inventory.search', compact(['itemEntities', 'selectedTags', 'selectedLocations', 'selectedItementities']));
    }
}
