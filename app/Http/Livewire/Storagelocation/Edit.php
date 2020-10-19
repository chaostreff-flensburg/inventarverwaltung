<?php

namespace App\Http\Livewire\Storagelocation;

use App\Models\Storagelocation;
use Livewire\Component;

class Edit extends Component
{
    public $storagelocation;
    public $name;
    public $description;

    public function mount(Storagelocation $storagelocation)
    {
        $this->storagelocation = $storagelocation;
        $this->name = $storagelocation->name;
        $this->description = $storagelocation->description;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'min:2|unique:storagelocations',
            'description' => 'string',
        ]);
    }

    public function saveStoragelocation()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:storagelocations|min:2',
            'description' => 'required|string',
        ]);

        $this->storagelocation->name = $validatedData['name'];
        $this->storagelocation->description = $validatedData['description'];

        $this->storagelocation->save();

        return redirect()->route('storagelocation.show', [
            'storagelocation' => $this->storagelocation,
        ]);
    }

    public function render()
    {
        return view('livewire.storagelocation.edit');
    }
}
