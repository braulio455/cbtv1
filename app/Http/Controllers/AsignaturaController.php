<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $grupos = Grupo::with('asignaturas')->get();
        return view('asignaturas.index', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        // Evitar duplicados
        $exists = Asignatura::where('grupo_id', $request->grupo_id)
            ->where('nombre', $request->nombre)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Asignatura ya existe en este grupo.');
        }

        Asignatura::create($request->all());
        return back()->with('success', 'Asignatura creada correctamente.');
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $asignatura->update($request->all());
        return back()->with('info', 'Asignatura actualizada.');
    }

    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return back()->with('danger', 'Asignatura eliminada.');
    }
}

