<?php

namespace App\Http\Livewire\Itementity;

use App\Models\Item;
use App\Models\Itementity;
use Livewire\Component;

class Show extends Component
{
    public $entity;

    public function mount(Itementity $itementity) 
    {
        $this->entity = $itementity;
    }

    public function render()
    {
        $itementity = $this->entity;

        return view(
            'livewire.itementity.show',
            compact([
                'itementity',
            ])
        );
    }
}
