<?php

namespace App\Http\Livewire\Itementity;

use App\Models\Itementity;
use Livewire\Component;

class Checkout extends Component
{
    public $entity;
    public $borrowed_by;

    public function mount(Itementity $itementity) 
    {
        $this->entity = $itementity;
        $this->borrowed_by = $itementity->borrowed_by;

        $this->isCheckoutAllowed();
    }

    protected function isCheckoutAllowed()
    {
        if ($this->entity->consumable == 1 || $this->entity->status != 1) {
            return redirect()->route('itementity.show', $this->entity);
        }
    }

    public function updated($field)
    {
        $this->isCheckoutAllowed();

        $this->validateOnly($field, [
            'borrowed_by' => 'min:2',
        ]);
    }

    public function saveEntity()
    {
        $this->isCheckoutAllowed();

        $validatedData = $this->validate([
            'borrowed_by' => 'required|min:2',
        ]);

        $this->entity->borrowed_by = $validatedData['borrowed_by'];
        $this->entity->status = 2;
        $this->entity->save();

        return redirect()->route('itementity.show', $this->entity);
    }

    public function render()
    {
        return view('livewire.itementity.checkout');
    }
}
