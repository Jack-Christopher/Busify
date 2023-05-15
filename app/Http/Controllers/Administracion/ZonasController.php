<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Ubigeo;
use App\Models\UbigeoZone;

class ZonasController extends Controller
{
    public function index()
    {
        $componentName = 'pages.administracion.zonas';

        $zones = Zone::all();

        $data = [
            'zones' => $zones
        ];

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $componentName = 'pages.administracion.zonasShow';

        $zone = Zone::find($id);

        $ubigeosZone = UbigeoZone::where('zone_id', $id)->get();

        $ubigeos = [];

        foreach ($ubigeosZone as $ubigeoZone) {
            $ubigeo = Ubigeo::where('code', $ubigeoZone->ubigeo_id)->first();
            $ubigeos[$ubigeoZone->position] = $ubigeo;
        }

        $data = [
            'zone' => $zone,
            'ubigeos' => $ubigeos
        ];

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
    }

    public function create()
    {
        $componentName = 'pages.administracion.zonasCreate';

        $ubigeos = Ubigeo::all();

        $data = [
            'ubigeos' => $ubigeos
        ];

        

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $zone = new Zone();
        $zone->name = $request->name;
        $zone->save();

        // foreach ubigeo_id_i as $ubigeo_id
        $i = 0;
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'ubigeo_id_') !== false) {
                $ubigeoZone = new UbigeoZone();
                // fill one zero if $value is less than 6 characters
                $ubigeoZone->ubigeo_id = str_pad($value, 6, '0', STR_PAD_LEFT);
                $ubigeoZone->zone_id = $zone->id;
                $ubigeoZone->position = $i;
                $ubigeoZone->save();
                $i++;
            }
        }
        
        return back()
            ->with('message', 'Zona creada correctamente');
    }

    public function destroy($id)
    {
        $zone = Zone::find($id);
        $zone->delete();

        return back()
            ->with('message', 'Zona eliminada correctamente');
    }
}
