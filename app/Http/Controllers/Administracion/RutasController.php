<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Zone;
use App\Models\Ubigeo;
use App\Models\UbigeoZone;
use App\Models\Servicio;


class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $componentName = 'pages.administracion.rutas';

        $rutas = Ruta::all();

        $data = [
            'rutas' => $rutas
        ];

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $componentName = 'pages.administracion.rutasCreate';

        $servicios = Servicio::all();

        $data = [
            'servicios' => $servicios
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
        $ruta = new Ruta();
        $ruta->nombre = $request->nombre;
        $ruta->zona_id = $request->zona_id;
        $ruta->origen_id = $request->origen_id;
        $ruta->destino_id = $request->destino_id;
        $ruta->servicio_id = $request->servicio_id;
        $ruta->precio = $request->precio;
        $ruta->save();

        return back()
            ->with('message', 'Ruta creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $componentName = 'pages.administracion.rutasShow';

        $ruta = Ruta::find($id);
        $zona = Zone::find($ruta->zona_id);
        $origen = Ubigeo::join('ubigeo_zone', 'ubigeo.code', '=', 'ubigeo_zone.ubigeo_id')
            ->where('ubigeo_zone.zone_id', '=', $ruta->zona_id)
            ->where('ubigeo_zone.position', '=', $ruta->origen_id)
            ->first();

        $destino = Ubigeo::join('ubigeo_zone', 'ubigeo.code', '=', 'ubigeo_zone.ubigeo_id')
            ->where('ubigeo_zone.zone_id', '=', $ruta->zona_id)
            ->where('ubigeo_zone.position', '=', $ruta->destino_id)
            ->first();

        $data = [
            'ruta' => $ruta,
            'zona' => $zona,
            'origen' => $origen,
            'destino' => $destino
        ];

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
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
