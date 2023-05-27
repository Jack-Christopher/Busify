<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Ubigeo;
use App\Models\UbigeoZone;
use App\Models\DuracionViaje;

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

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'ubigeo_') !== false) {
                $ubigeoZone = new UbigeoZone();
                $ubigeoZone->ubigeo_id = str_pad($value, 6, '0', STR_PAD_LEFT);
                $ubigeoZone->zone_id = $zone->id;
                $ubigeoZone->position = intval(substr($key, 7));
                $ubigeoZone->save();
            }
        }

        return redirect()
            ->route('administracion.duracion-de-viaje.create', ['zone_id' => $zone->id])
            ->with('message', 'Zona creada correctamente. Ahora debe registrar la duración de cada tramo de viaje');
    }

    public function destroy($id)
    {
        $zone = Zone::find($id);
        $zone->delete();

        return back()
            ->with('message', 'Zona eliminada correctamente');
    }
}
