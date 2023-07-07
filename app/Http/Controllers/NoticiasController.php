<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Categoria;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categoriaPerdidaObjetos = Categoria::where('nombre', 'Pérdida de Objetos')->first();
        $reportes = Reporte::where('categoria_id', $categoriaPerdidaObjetos->id)->get();

        return view('noticias.index')->with('reportes', $reportes);
    }
    public function detalle($id)
    {
        $reporte = Reporte::findOrFail($id);

        return view('noticias.detalle', compact('reporte'));
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
