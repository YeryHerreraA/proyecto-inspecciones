<?php

namespace App\Http\Controllers;

use App\Models\Condicion;
use Illuminate\Http\Request;

class CondicionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'inspeccion_id' => 'required|exists:inspeccions,id',
            'tipo' => 'required|string',
            'categoria' => 'required|string',
            'descripcion' => 'required|string',
            'criticidad' => 'required|string',
            'evidencia' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        // Si hay imagen, se guarda en storage/app/public/evidencias
        if ($request->hasFile('evidencia')) {
            $data['evidencia'] = $request->file('evidencia')->store('evidencias', 'public');
        }

        Condicion::create($data);

        return redirect()->route('inspecciones.show', $request->inspeccion_id)
                         ->with('success', 'Condición registrada correctamente.');
    }
}
