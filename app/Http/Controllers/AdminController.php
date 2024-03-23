<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\Categoria;

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

            // Obtener los reportes pendientes a la categoria
            $reportes = Reporte::where('categoria_id', $administraddor->id)
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

    public function cuentaA()
    {
        return view('admin.home.cuenta');
    }

    public function Raprobados()
    {
        $administrador = Auth::user()->administrador;

        if ($administrador) {
            $reportes = Reporte::where('categoria_id', $administrador->id)
                ->where('estado', 'aprobado')
                ->get();
            return view('admin.report.aprobado')->with('reportes', $reportes);
        }
    }

    public function detalleAprobado($id)
    {
        $reporte = Reporte::findOrFail($id);

        return view('admin.report.detalleAprobado', compact('reporte'));
    }

    public function Rejecutados()
    {
        $administrador = Auth::user()->administrador;

        if ($administrador) {
            $reportes = Reporte::where('categoria_id', $administrador->id)
                ->where('estado', 'En ejecución')
                ->get();
            return view('admin.report.Rejecutado')->with('reportes', $reportes);
        }
    }

    public function Rsolucionados()
    {
        $administrador = Auth::user()->administrador;
        if ($administrador) {
            $reportes = Reporte::where('categoria_id', $administrador->id)
                 ->where('estado', 'Solucionado')
                 ->get();
            return view('admin.report.rSolucionado')->with('reportes', $reportes);
        }
    }

    public function Rnosolucionados()
    {
        $administrador = Auth::user()->administrador;
        if ($administrador) {
            $reportes = Reporte::where('categoria_id', $administrador->id)
                 ->where('estado', 'No solucionado')
                 ->get();
            return view('admin.report.rNosolucionado')->with('reportes', $reportes);
        }
    }

    public function Rdesaprobados()
    {
        $reportes = Reporte::paginate(4);

        $administrador = Auth::user()->administrador;

        if ($administrador) {
            $reportes = Reporte::where('categoria_id', $administrador->id)
                 ->where('estado', 'desaprobado')
                 ->get();
            return view('admin.report.desaprobado')->with('reportes', $reportes);
        }
    }

    public function ejecutarR($id)
    {
        $reporte = Reporte::findOrfail($id);

        // Actualizar el estado a en ejecución
        $reporte->estado = 'En ejecución';
        $reporte->save();

        return redirect()->route('panel2');
    }

    public function solucionadoR($id)
    {
        $reporte = Reporte::findOrfail($id);

        // Actualizamos el estado a solucionado
        $reporte->estado = 'Solucionado';
        $reporte->save();

        return redirect()->route('panel2');
    }

    public function noSolucionadoR($id)
    {
        $reporte = Reporte::findOrfail($id);

        // Actualizamos el estado a No solucionado
        $reporte->estado = 'No solucionado';
        $reporte->save();

        return redirect()->route('panel2');
    }

    public function categorias()
    {
        $categorias = Categoria::paginate(5);
        return view('admin.report.categorias', compact('categorias'));
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
        $request->validate([
         'categoria' => 'required',
         'descripcion' => 'required',  
        ]);

        // Creamos la nueva categoria
        $categoria = new Categoria();
        $categoria->nombre = $request->input('categoria');
        $categoria->descripcion = $request->input('descripcion');

        // Obtenemos el admin logueado
        $administrador = Auth::user()->administrador;

        // Asociamos la categoria al admin y guardamos
        $administrador->categoria()->save($categoria);

        return redirect()->route('categorias');
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
    public function edit(Categoria $categoria)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required', 
            'descripcion' => 'required'
        ]);

        $categoria = Categoria::findOrfail($id);

        // Actualizamos la categoria
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();


        return redirect()->route('categorias');
    }
    public function eliminarCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias')->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();
        return redirect()->route('desaprobados')->with('success', 'success');
    }
}
