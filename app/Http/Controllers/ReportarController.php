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

        return view('reportar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $categorias = Categoria::all();

        return view('reportar.crear', compact('categorias'));
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
        $rules = [
            'ubicacion' => 'required',
            'fecha' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ];
        $messages = [
            'ubicacion.required' => 'La ubicación es requerida',
            'fecha.required' => 'La fecha es requerida',
            'descripcion.required' => 'La descripción es importante',
            'imagen.required' => 'La imagen es reuerida'
        ];
        $this->validate($request, $rules, $messages);

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


        // Obtener el admin correspondiente a la categoria
        $administrador = Administrador::whereHas('categoria', function($query) use ($categoriaId) {
            $query->where('id', $categoriaId);
        })->first();

        if ($administrador) {
            // Creamos el reporte
            $reporte = new Reporte();
            $reporte->user()->associate($usuario);
            $reporte->categoria()->associate($administrador);
            $reporte->administrador()->associate($administrador);
            $reporte->ubicacion = $ubicacion;
            $reporte->fecha = $fecha;
            $reporte->evidencia = $imagenReporte;
            $reporte->descripcion = $descripcion;
            $reporte->save();
        }
        return redirect()->route('reportes')->with('success', 'success');
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
    public function destroy($id)
    {
        //
        $reporte = Reporte::findorFail($id);
        $reporte->delete();
        return redirect()->route('reportes')->with('success', 'success');

    }
}
