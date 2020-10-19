<?php

namespace App\Http\Livewire\Storagelocation;

use App\Models\Storagelocation;
use Livewire\Component;

class Index extends Component
{
    public function mount()
    {

    }

    public function create()
    {
        return redirect()->route('storagelocation.create');
    }

    public function render()
    {
        $storagelocations = Storagelocation::all();

        return view(
            'livewire.storagelocation.index',
            compact([
                'storagelocations'
            ])
        );
    }
}
