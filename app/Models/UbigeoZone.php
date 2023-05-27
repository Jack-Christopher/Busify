<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ubigeo;

class UbigeoZone extends Model
{
    use HasFactory;

    protected $table = 'ubigeo_zone';


    public function ubigeoName()
    {
        $ubigeo = Ubigeo::where('code', $this->ubigeo_id)->first();
        return $ubigeo->region . ' - ' . $ubigeo->province . ' - ' . $ubigeo->district;
    }
}
