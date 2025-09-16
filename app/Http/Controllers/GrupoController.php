<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Programa;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::with('programas')->get();
        return view('grupos.index', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:grupos,nombre',
            'descripcion' => 'nullable|max:255',
        ], [
            'nombre.required' => 'El nombre del grupo es obligatorio.',
            'nombre.unique' => 'Ya existe un grupo con ese nombre.',
        ]);

        Grupo::create($request->only('nombre', 'descripcion'));

        return back()->with('success', '✅ Grupo creado correctamente.');
    }

    public function update(Request $request, Grupo $grupo)
    {
        $request->validate([
            'nombre' => 'required|unique:grupos,nombre,' . $grupo->id,
            'descripcion' => 'nullable|max:255',
        ]);

        $grupo->update($request->only('nombre', 'descripcion'));

        return back()->with('info', '✏️ Grupo actualizado correctamente.');
    }

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return back()->with('danger', '🗑️ Grupo y sus programas eliminados.');
    }

    public function storePrograma(Request $request, Grupo $grupo)
    {
        $request->validate([
            'nombre' => 'required|max:100|unique:programas,nombre,NULL,id,grupo_id,' . $grupo->id,
            'descripcion' => 'nullable|max:255',
        ], [
            'nombre.required' => 'El nombre del programa es obligatorio.',
            'nombre.unique' => 'Ese programa ya existe en este grupo.',
        ]);

        $grupo->programas()->create($request->only('nombre', 'descripcion'));

        return back()->with('success', '✅ Programa añadido correctamente.');
    }

    public function updatePrograma(Request $request, Programa $programa)
    {
        $request->validate([
            'nombre' => 'required|max:100|unique:programas,nombre,' . $programa->id . ',id,grupo_id,' . $programa->grupo_id,
            'descripcion' => 'nullable|max:255',
        ]);

        $programa->update($request->only('nombre', 'descripcion'));

        return back()->with('info', '✏️ Programa actualizado correctamente.');
    }

    public function destroyPrograma(Programa $programa)
    {
        $programa->delete();

        return back()->with('danger', '🗑️ Programa eliminado correctamente.');
    }
}
