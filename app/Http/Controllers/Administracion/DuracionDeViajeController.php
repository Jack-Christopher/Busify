<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DuracionViaje;
use App\Models\UbigeoZone;

class DuracionDeViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $componentName = 'pages.administracion.duracionDeViaje';

        $duracionViaje = DuracionViaje::all();

        $data = [
            'duracionViaje' => $duracionViaje
        ];

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $componentName = 'pages.administracion.duracionDeViajeCreate';

        // get data from url
        $zone_id = $request->query('zone_id');

        $ubigeo_zones = UbigeoZone::where('zone_id', $zone_id)
            ->orderBy('position')->get();

        $duraciones = [];

        foreach ($ubigeo_zones as $index => $item)
        {
            if ($index < count($ubigeo_zones) - 1)
            {
                $duraciones[] = DuracionViaje::getMinutesByIds(
                    $ubigeo_zones[$index]->ubigeo_id, $ubigeo_zones[$index + 1]->ubigeo_id);
            }
        }

        $data = [
            'duraciones' => $duraciones,
            'ubigeo_zones' => $ubigeo_zones
        ];

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        foreach ($request->all() as $key => $value) {
            // check if the $key is in the format duracionViaje[ubigeo_id][ubigeo_id]
            if (strpos($key, 'duracionViaje_') !== false) {
                // get the two last elements of array split ('-')
                $ubigeo_ids = explode('_', $key);
                $duracionViaje = new DuracionViaje();
                $duracionViaje->ciudad_a = $ubigeo_ids[1];
                $duracionViaje->ciudad_b = $ubigeo_ids[2];
                $duracionViaje->minutos = $value;
                $duracionViaje->save();
            }
        }

        return redirect()->route('administracion.duracion-de-viaje.index')
            ->with('message', 'Duración de viaje creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
