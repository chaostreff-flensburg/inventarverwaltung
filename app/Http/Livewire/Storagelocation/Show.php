<?php

namespace App\Http\Livewire\Storagelocation;

use App\Models\Storagelocation;
use Livewire\Component;

class Show extends Component
{
    public $location;

    public function mount(Storagelocation $location)
    {
        $this->location = $location;
    }

    public function delete() {
        if (count($this->location->itementities)) {
            session()->flash('message', 'Storage location contains item entities.');
        }

        $this->location->delete();

        return redirect()->route('storagelocation.index');
    }

    public function render()
    {
        return view(
            'livewire.storagelocation.show',
        );
    }
}
