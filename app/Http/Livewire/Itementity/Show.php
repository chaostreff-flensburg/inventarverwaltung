<?php

namespace App\Http\Livewire\Itementity;

use App\Models\Itementity;
use Livewire\Component;

class Show extends Component
{
    public $entity;

    public function mount(Itementity $itementity) 
    {
        $this->entity = $itementity;
    }

    public function lost() {
        $this->entity->status = -1;
        $this->entity->save();
    }

    public function checkout() {
        return redirect()->route('itementity.checkout', $this->entity);
    }

    public function checkin() {
        $this->entity->status = 1;
        $this->entity->save();
    }

    public function pick() {
        $this->entity->amount--;
        $this->entity->save();
    }

    public function delete() {
        $this->entity->delete();
        return redirect()->route('inventory.search');
    }

    public function render()
    {
        return view(
            'livewire.itementity.show',
        );
    }
}
