<?php

namespace App\Http\Livewire\Elements;

use Livewire\Component;
use App\Models\Ubigeo;

class UbigeoSearcher extends Component
{
    public $searchTerm;
    public $ubigeoOptions;
    public $selectedUbigeoCode;

    public function mount()
    {
        $this->searchTerm = '';
        $this->ubigeoOptions = [];
        $this->selectedUbigeoCode = '';
    }

    public function add()
    {
        $this->emitUp('addUbigeo', $this->selectedUbigeoCode);
    }

    public function render()
    {
        if (strlen($this->searchTerm) >= 2)
        {
            $this->ubigeoOptions = Ubigeo::where('region', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('province', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('district', 'like', '%' . $this->searchTerm . '%')
                ->get();
        }
        else 
        {
            $this->ubigeoOptions = [];
        }
        return view('livewire.elements.ubigeo-searcher', [
            'ubigeoOptions' => $this->ubigeoOptions
        ]);
    }
}
