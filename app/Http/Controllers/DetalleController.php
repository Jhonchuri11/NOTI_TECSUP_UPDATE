<?php

namespace App\Http\Controllers;
use App\Models\Reporte;



class DetalleController extends Controller
{
    //
    public function index()
    {
        return view('noticias.detalle');
    }

    public function detalle($id)
    {
        $reporte = Reporte::findOrFail($id);

        return view('noticias.detalle', compact('reporte'));
   }
}
