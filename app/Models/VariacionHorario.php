<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariacionHorario extends Model
{
    use HasFactory;
    protected $table = 'variacion_horario';

    protected $fillable = [
        'viaje_id',
        'posicion',
        'minutos'
    ];
}
