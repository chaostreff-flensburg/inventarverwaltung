<?php

namespace App\Http\Livewire\Storagelocation;

use App\Models\Storagelocation;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'min:2|unique:storagelocations',
            'description' => 'string',
        ]);
    }

    public function saveStorageLocation()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:storagelocations|min:2',
            'description' => 'required|string',
        ]);

        Storagelocation::create($validatedData);

        return redirect()->route('storagelocation.index');
    }

    public function render()
    {
        return view('livewire.storagelocation.create');
    }
}
