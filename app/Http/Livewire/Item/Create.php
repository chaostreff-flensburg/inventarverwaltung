<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'min:2|unique:items',
            'description' => 'string',
        ]);
    }

    public function saveItem()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:items|min:2',
            'description' => 'required|string',
        ]);

        Item::create($validatedData);

        return redirect()->route('inventory.search');
    }

    public function render()
    {
        return view('livewire.item.create');
    }
}
