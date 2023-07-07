<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reporte;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtenemos el administrador actualmente logueado
        $administraddor = Auth::user()->administrador;

        // Se verifica si el administrador está asociado a alguna categoria
        if ($administraddor) {
            // Obtenemos ka categoria supervisada por el admin
            $categoria = $administraddor->categoria;

            // Obtenemos los reportes de la categoria supervisada
            $reportes = $categoria->reporte;

            // Obtener los reportes pendientes a la categoria
            $reportes = Reporte::where('categoria_id', $categoria->id)
                ->where('estado', 'pendiente')
                ->get();

            return view('admin.report.reporte')->with('reportes', $reportes);
        }

         
    }

    public function detalleA($id)
    {
        $reporte = Reporte::findOrFail($id);

        return view('admin.report.detalleA', compact('reporte'));
    }

    public function AprobarReporte($id) 
    {
        // Obtenemos el reporte ppr su ID
        $reporte = Reporte::findOrfail($id);

        // Actualizar el estado del reporte a "Aprobado"
        $reporte->estado = 'aprobado';
        $reporte->save();

        return redirect()->route('panel2');
    }

    public function DesaprobarReporte($id)
    {
        // Obtenemos el reporte por el ID
        $reporte = Reporte::findOrFail($id);

        $reporte->estado = 'desaprobado';
        $reporte->save();

        return redirect()->route('panel2');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
