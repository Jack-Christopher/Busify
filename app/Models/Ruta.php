<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\UbigeoZone;

class Ruta extends Model
{
    use HasFactory;

    public function viajes(): HasMany
    {
        return $this->hasMany(Viaje::class);
    }

    public function zona(): BelongsTo
    {
        return $this->belongsTo(Zona::class);
    }



    public function getUbigeos(): array
    {
        $ubigeos = [];
        
        $ubigeoZones = UbigeoZone::where('zone_id', $this->zona_id)
            ->where('position', '>=', $this->origen_id)
            ->where('position', '<=', $this->destino_id)
            ->orderBy('position', 'asc')
            ->get();

        foreach ($ubigeoZones as $ubigeoZone) {
            $ubigeos[] = $ubigeoZone->ubigeo;
        }

        return $ubigeos;
    }
}
