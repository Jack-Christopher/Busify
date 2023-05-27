<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuracionViaje extends Model
{
    use HasFactory;

    protected $table = 'duracion_viaje';

    public static function getMinutesByIds($origen, $destino)
    {
        $duracionViaje = DuracionViaje::where('ciudad_a', $origen)
            ->where('ciudad_b', $destino)
            ->orWhere('ciudad_a', $destino)
            ->where('ciudad_b', $origen)
            ->first();

        if (!$duracionViaje) {
            return -1;
        }

        return $duracionViaje->minutos;
    }

    public function getCityAName()
    {
        $ciudad_a = Ubigeo::where('code', $this->ciudad_a)->first();
        $nombres = $ciudad_a->region . ' - ' . $ciudad_a->province . ' - ' . $ciudad_a->district;

        return $nombres;
    }

    public function getCityBName()
    {
        $ciudad_b = Ubigeo::where('code', $this->ciudad_b)->first();
        $nombres = $ciudad_b->region . ' - ' . $ciudad_b->province . ' - ' . $ciudad_b->district;

        return $nombres;
    }
}
