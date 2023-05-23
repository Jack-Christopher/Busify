<?php

namespace App\Http\Livewire\Blocks;

use Livewire\Component;
use App\Models\Zone;
use App\Models\Ubigeo;
use App\Models\UbigeoZone;


class RutaSetter extends Component
{
    public $zonas;
    public $zona_id;
    public $ubigeoOptions;
    // public $origen_id;
    // public $destino_id;

    public function mount()
    {
        $this->zonas = Zone::all();
        $this->ubigeoOptions = [];
    }

    public function onChangeZona()
    {
        $this->ubigeoOptions = Ubigeo::join('ubigeo_zone', 'ubigeo.code', '=', 'ubigeo_zone.ubigeo_id')
            ->where('ubigeo_zone.zone_id', $this->zona_id)
            ->select('ubigeo.*', 'ubigeo_zone.position')
            ->orderBy('ubigeo_zone.position', 'asc')
            ->get();
    }


    public function render()
    {
        return view('livewire.blocks.ruta-setter');
    }
}
