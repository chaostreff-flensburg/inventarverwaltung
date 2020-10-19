<?php

namespace App\Http\Livewire\Storagelocation;

use Livewire\Component;
use App\Models\Storagelocation;

class Index extends Component
{
    public function mount()
    {

    }

    public function render()
    {
        $storageLocations = Storagelocation::all();

        return view(
            'livewire.storagelocation.index',
            compact([
                'storageLocations'
            ])
        );
    }
}
