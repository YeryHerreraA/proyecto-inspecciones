<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspeccion;

class InspeccionController extends Controller
{
    public function index(Request $request)
    {
        $inspecciones = Inspeccion::where('user_id', $request->user()->id)->get();
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
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        Inspeccion::create($data);

        return redirect()->route('inspecciones.index')->with('success', 'Inspección registrada correctamente.');
    }

    public function show($id)
    {
        $inspeccion = Inspeccion::findOrFail($id);
        return view('inspecciones.show', compact('inspeccion'));
    }

    // API: Listar inspecciones
    public function apiIndex(Request $request)
    {
        return Inspeccion::where('user_id', $request->user()->id)->get();
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
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $inspeccion = Inspeccion::create($data);
        return response()->json($inspeccion, 201);
    }

    // API: Eliminar inspección
    public function apiDestroy($id)
    {
        $inspeccion = Inspeccion::findOrFail($id);
        $inspeccion->delete();
        return response()->json(['message' => 'Inspección eliminada correctamente.']);
    }
}
