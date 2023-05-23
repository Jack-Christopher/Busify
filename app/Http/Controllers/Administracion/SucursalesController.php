<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Models\Ubigeo;

class SucursalesController extends Controller
{
    public function index()
    {
        $componentName = 'pages.administracion.sucursales';

        $sucursales = Sucursal::all();

        $data = [
            'sucursales' => $sucursales
        ];

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $componentName = 'pages.administracion.sucursalesShow';

        $sucursal = Sucursal::find($id);
        $ubigeo = Ubigeo::find($sucursal->ubigeo_id);

        $data = [
            'sucursal' => $sucursal,
            'ubigeo' => $ubigeo
        ];

        return view('dashboard', [
            'componentName' => $componentName,
            'data' => $data
        ]);
    }

    public function create()
    {
        $componentName = 'pages.administracion.sucursalesCreate';

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
        $sucursal = new Sucursal();
        $sucursal->name = $request->name;
        $sucursal->business_name = $request->business_name;
        $sucursal->ubigeo_id = $request->ubigeo_id;
        $sucursal->address = $request->address;
        $sucursal->phone = $request->phone;
        $sucursal->save();

        return back()
            ->with('message', 'Sucursal creada con éxito');
    }



    public function destroy($id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->delete();

        return back()
            ->with('message', 'Sucursal eliminada con éxito');
    }
}
