<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspeccion;

class InspeccionController extends Controller
{
    public function index()
    {
        $inspecciones = Inspeccion::all();
        return view('inspecciones.index', compact('inspecciones'));
    }

    public function create()
    {
        return view('inspecciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required|string',
            'fecha' => 'required|date',
            'tipo' => 'required|string',
        ]);

        Inspeccion::create($request->all());

        return redirect()->route('inspecciones.index')->with('success', 'Inspección registrada correctamente.');
    }

    public function show($id)
    {
        $inspeccion = Inspeccion::findOrFail($id);
        return view('inspecciones.show', compact('inspeccion'));
    }

    // API: Listar inspecciones
    public function apiIndex()
    {
        return Inspeccion::all();
    }

    // API: Detalle de inspección con condiciones
    public function apiShow($id)
    {
        return Inspeccion::with('condiciones')->findOrFail($id);
    }

    // API: Crear inspección
    public function apiStore(Request $request)
    {
        $request->validate([
            'area' => 'required|string',
            'fecha' => 'required|date',
            'tipo' => 'required|string',
            'observaciones' => 'nullable|string',
        ]);
        $inspeccion = Inspeccion::create($request->all());
        return response()->json($inspeccion, 201);
    }
}
