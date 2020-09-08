<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use App\Models\Itementity;
use Livewire\Component;

class Show extends Component
{
    public $item;

    public function mount(Item $item) 
    {
        $this->item = $item;
    }

    public function delete() {
        $this->item->delete();
        $this->item->entities()->delete();

        return redirect()->route('inventory.search');
    }

    public function render()
    {
        return view(
            'livewire.item.show',
        );
    }
}
