<?php

namespace App\Http\Livewire\Blocks;

use Livewire\Component;
use App\Models\Ubigeo;

class UbigeoSearcherGroup extends Component
{
    public $selectedOptions;

    protected $listeners = ['addUbigeo'];

    public function mount()
    {
        $this->selectedOptions = [];
    }

    public function addUbigeo($ubigeoCode)
    {
        // padd left for ubigeo code with 6 digits
        $ubigeoCode = str_pad($ubigeoCode, 6, '0', STR_PAD_LEFT);
        $ubigeo = Ubigeo::where('code', $ubigeoCode)->first();
        $this->selectedOptions[] = [
            'code' => $ubigeoCode,
            'name' => $ubigeo->region . ' - ' . $ubigeo->province . ' - ' . $ubigeo->district
        ];
    }

    public function remove($position)
    {
        $this->selectedOptions = array_merge(
            array_slice($this->selectedOptions, 0, $position),
            array_slice($this->selectedOptions, $position + 1)
        );
    }

    public function moveUp($position)
    {
        if ($position == 0 || count($this->selectedOptions) == 1) return;

        $this->selectedOptions = array_merge(
            array_slice($this->selectedOptions, 0, $position - 1),
            [$this->selectedOptions[$position], $this->selectedOptions[$position - 1]],
            array_slice($this->selectedOptions, $position + 1)
        );
    }

    public function moveDown($position)
    {
        if ($position == count($this->selectedOptions) - 1 || count($this->selectedOptions) == 1) return;

        $this->selectedOptions = array_merge(
            array_slice($this->selectedOptions, 0, $position),
            [$this->selectedOptions[$position + 1], $this->selectedOptions[$position]],
            array_slice($this->selectedOptions, $position + 2)
        );
    }

    public function render()
    {
        return view('livewire.blocks.ubigeo-searcher-group', [
            'selectedOptions' => $this->selectedOptions,
        ]);
    }
}
