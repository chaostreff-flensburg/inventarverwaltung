<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class Edit extends Component
{
    public $item;

    public $name;
    public $description;

    public function mount(Item $item) 
    {
        $this->item = $item;
        $this->name = $item->name;
        $this->description = $item->description;
    }

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

        $this->item->name = $validatedData['name'];
        $this->item->description = $validatedData['description'];

        $this->item->save();

        return redirect()->route('item.show', [
            'item' => $this->item,
        ]);
    }

    public function render()
    {
        return view('livewire.item.edit');
    }
}
