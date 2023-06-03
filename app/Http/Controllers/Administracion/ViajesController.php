<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Viaje;
use App\Models\Ruta;
use App\Models\DuracionViaje;
use App\Models\VariacionHorario;
use Carbon\Carbon;

class ViajesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $componentName = 'pages.administracion.viajes';

        $viajes = Viaje::all();

        $data = [
            'viajes' => $viajes
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
        $componentName = 'pages.administracion.viajesCreate';

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = "";

        // if rango_fechas checkbox is checked
        if (!$request->rango_fechas) 
        {
            $viaje = new Viaje();
            $viaje->ruta_id = $request->ruta_id;
            $viaje->hora = $request->hora;
            $viaje->fecha = $request->fecha;
            $viaje->precio = Ruta::find($request->ruta_id)->precio;
            $viaje->save();

            $message = 'Viaje creado con éxito';
        }
        else 
        {
            // iterate over the dates creating a new Viaje for each one
            $inicio = Carbon::parse($request->fecha_inicio);
            $fin = Carbon::parse($request->fecha_fin);

            $precio = Ruta::find($request->ruta_id)->precio;

            // Iterate over the date range
            for ($fecha = $inicio; $fecha->lte($fin); $fecha->addDay()) 
            {
                $viaje = new Viaje();
                $viaje->ruta_id = $request->ruta_id;
                $viaje->hora = $request->hora;
                $viaje->fecha = $fecha;
                $viaje->precio = $precio;
                $viaje->save();
            }

            $message = 'Viajes por rango de fechas creados con éxito';
        }

        return back()
            ->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // there are 2 options for the $id parameter:
        // 1. a date in the format 'DD-MMMM-YYYY', then we show all the viajes for that date
        // 2. a Viaje id, then we show the details of that Viaje

        $componentName = 'pages.administracion.viajesShow';
        $data = [];

        $isDate = strpos($id, '-') !== false;
        $data['isDate'] = $isDate;

        if ($isDate) 
        {
            $data['date'] = $id;
            $date = Carbon::parse($id);
            $viajes = Viaje::where('fecha', $date)->get();
            $data['viajes'] = $viajes;
        }
        else 
        {
            $viaje = Viaje::find($id);
            $ubigeos = $viaje->ruta->getUbigeos();
            $fechaTiempo = Carbon::parse($viaje->fecha . ' ' . $viaje->hora);

            $tiempos = [ $fechaTiempo ];
            // get the duration of the trip between each pair of ubigeos
            // and add it to the $tiempos array
            for ($i = 0; $i < count($ubigeos) - 1; $i++) 
            {
                $variacion = VariacionHorario::where('viaje_id', $viaje->id)
                    ->where('posicion', $i + 1)
                    ->first()
                    ->minutos ?? 0;

                $next = $fechaTiempo->copy()->addMinutes(
                    DuracionViaje::getMinutesByIds($ubigeos[$i]->code, $ubigeos[$i + 1]->code) + $variacion);
                $tiempos[] = $next;
                $fechaTiempo = $next;
            }

            $data['viaje'] = $viaje;
            $data['ubigeos'] = $ubigeos;
            $data['tiempos'] = $tiempos;
        }


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
        $componentName = 'pages.administracion.viajesEdit';

        $viaje = Viaje::find($id);
        $ubigeos = $viaje->ruta->getUbigeos();
        
        for ($i = 0; $i < count($ubigeos); $i++)
        {
            // select current variaciones_horario for this viaje
            $variacion = VariacionHorario::where('viaje_id', $id)
                ->where('posicion', $i)
                ->first();

            $variaciones[] = $variacion ? $variacion->minutos : 0;
        }
        
        $data = [
            'viaje' => $viaje,
            'ubigeos' => $ubigeos,
            'variaciones' => $variaciones
        ];

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $viaje = Viaje::find($id);
        $viaje->precio = $request->precio;

        if ($request->variacion_0 != 0)
        {
            // change Viaje start datetime
            $fecha = Carbon::parse($viaje->fecha . ' ' . $viaje->hora);
            $fecha->addMinutes($request->variacion_0);
            $viaje->fecha = $fecha->format('Y-m-d');
            $viaje->hora = $fecha->format('H:i:s');
        }
        $viaje->save();

        for ($i = 1; $i < $request->n_variaciones; $i++)
        {
            if ($request->{'variacion_' . $i} != 0)
            {
                VariacionHorario::updateOrCreate(
                    ['viaje_id' => $id, 'posicion' => $i],
                    ['minutos' => $request->{'variacion_' . $i}]
                );
            }
        }

        return redirect()->route('administracion.viajes.show', $id)
            ->with('message', 'Viaje actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
