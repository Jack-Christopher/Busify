<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Viaje extends Model
{
    use HasFactory;

    public function ruta(): BelongsTo
    {
        return $this->belongsTo(Ruta::class);
    }
}
