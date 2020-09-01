<?php

namespace App\Http\Livewire\Itementity;

use App\Models\Item;
use App\Models\Itementity;
use App\Models\Storagelocation;
use Livewire\Component;

class Create extends Component
{
    public $identifier;
    public $item_id;
    public $consumable = false;
    public $amount;
    public $storagelocation_id;

    public function mount()
    {

    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'identifier' => 'min:2|unique:itementities',
            'item_id' => 'exists:items,id',
            'consumable' => 'boolean',
            'amount' => 'nullable|integer',
            'storagelocation_id' => 'exists:storagelocations,id',
        ]);
    }

    public function saveEntity()
    {
        $validatedData = $this->validate([
            'identifier' => 'required|min:2|unique:itementities',
            'item_id' => 'required|exists:items,id',
            'consumable' => 'boolean',
            'amount' => 'nullable|integer',
            'storagelocation_id' => 'required|exists:storagelocations,id',
        ]);

        Itementity::create($validatedData);

        return redirect()->route('inventory.search');
    }

    public function render()
    {
        $items = Item::all();
        $storageLocations = Storagelocation::all();

        return view(
            'livewire.itementity.create',
            compact([
                'items',
                'storageLocations'
            ])
        );
    }
}
