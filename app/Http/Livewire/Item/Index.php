<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class Index extends Component
{
    public function mount()
    {

    }

    public function create()
    {
        return redirect()->route('item.create');
    }

    public function render()
    {
        $items = Item::with('image')->get();

        return view(
            'livewire.item.index',
            compact([
                'items'
            ])
        );
    }
}
