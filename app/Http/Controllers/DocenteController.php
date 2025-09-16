<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Grupo;
use App\Models\Asignatura;
use App\Models\DocenteAsignatura;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::with('asignaturas.grupo')->get();
        $grupos = Grupo::with('asignaturas')->get();
        return view('docentes.index', compact('docentes', 'grupos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres'            => 'required|string|max:255',
            'apellidos'          => 'required|string|max:255',
            'dni'                => 'required|digits:8|unique:docentes,dni',
            'telefono'           => 'required|digits:9|unique:docentes,telefono',
            'direccion'          => 'required|string|max:255',
            'especialidad'       => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:255|unique:docentes,correo_electronico',
        ]);

        Docente::create($data);

        return back()->with('success', '✅ Docente registrado correctamente.');
    }

    public function edit(Docente $docente)
    {
        $grupos = Grupo::with('asignaturas')->get();
        return view('docentes.edit', compact('docente', 'grupos'));
    }

    public function update(Request $request, Docente $docente)
    {
        $data = $request->validate([
            'nombres'            => 'required|string|max:255',
            'apellidos'          => 'required|string|max:255',
            'dni'                => 'required|digits:8|unique:docentes,dni,' . $docente->id,
            'telefono'           => 'required|digits:9|unique:docentes,telefono,' . $docente->id,
            'direccion'          => 'required|string|max:255',
            'especialidad'       => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:255|unique:docentes,correo_electronico,' . $docente->id,
        ]);

        $docente->update($data);

        return back()->with('info', '✏️ Datos del docente actualizados.');
    }

    public function destroy(Docente $docente)
    {
        $docente->asignaturas()->detach(); // elimina todas las asignaciones
        $docente->delete();

        return back()->with('danger', '🗑️ Docente eliminado correctamente.');
    }

    public function asignarAsignaturas(Request $request, Docente $docente)
    {
        $request->validate([
            'asignaturas'   => 'required|array',
            'asignaturas.*' => 'exists:asignaturas,id',
        ]);

        $docente->asignaturas()->sync($request->asignaturas);

        return back()->with('success', '📚 Asignaciones actualizadas correctamente.');
    }

    public function eliminarAsignacion($id)
    {
        $asignacion = DocenteAsignatura::findOrFail($id);
        $asignacion->delete();

        return back()->with('danger', '❌ Asignación eliminada correctamente.');
    }
}
