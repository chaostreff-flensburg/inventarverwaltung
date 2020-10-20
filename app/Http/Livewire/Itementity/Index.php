<?php

namespace App\Http\Livewire\Itementity;

use Livewire\Component;
use App\Models\Itementity;

class Index extends Component
{
    public function mount()
    {

    }

    public function create()
    {
        return redirect()->route('itementity.create');
    }

    public function render()
    {
        $itementities = Itementity::with(['item', 'storagelocation', 'image', 'tags'])->get();

        return view(
            'livewire.itementity.index',
            compact([
                'itementities'
            ])
        );
    }
}
