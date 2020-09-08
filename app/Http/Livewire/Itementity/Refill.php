<?php

namespace App\Http\Livewire\Itementity;

use App\Models\Itementity;
use Livewire\Component;

class Refill extends Component
{
    public $entity;
    public $amount;

    public function mount(Itementity $itementity) 
    {
        $this->entity = $itementity;
        $this->amount = $itementity->amount;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'amount' => 'integer',
        ]);
    }

    public function saveEntity()
    {
        $validatedData = $this->validate([
            'amount' => 'required|integer',
        ]);

        $this->entity->amount = $validatedData['amount'];
        $this->entity->save();

        return redirect()->route('itementity.show', $this->entity->id);
    }

    public function render()
    {
        return view(
            'livewire.itementity.refill',
        );
    }
}
