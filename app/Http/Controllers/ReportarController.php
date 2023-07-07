<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use App\Models\Reporte;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class ReportarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::all();

        return view('reportar.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $categoriaSeleccionada = $request->input('categoria');
        $categoriaIdSeleccionada = $request->input('categoria_id');

        return view('reportar.crear', compact('categoriaSeleccionada', 'categoriaIdSeleccionada'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function EnviarReporte(Request $request)
    {
        $usuario = Auth::user();
        $categoriaId = $request->input('categoria_id');
        $ubicacion = $request->input('ubicacion');
        $fecha = $request->input('fecha');
        $descripcion = $request->input('descripcion');
        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenReporte = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenReporte);
            $reporte['imagen'] = "$imagenReporte";
        }
        // Adminsitrador correspondiente a la categoria

       
        $administrador = Administrador::find($categoriaId);
        $categoria = $administrador->categoria;

       

        // Crear el reporte
        $reporte = new Reporte();
        $reporte->user()->associate($usuario);
        $reporte->categoria()->associate($categoria);
        $reporte->administrador()->associate($administrador);
        $reporte->ubicacion = $ubicacion;
        $reporte->fecha = $fecha;
        $reporte->evidencia = $imagenReporte;
        $reporte->descripcion = $descripcion;
        
        $reporte->save();

        return redirect()->route('home');
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
