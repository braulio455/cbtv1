<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{
    public function index()
    {
        return view('asistencias.index', [
            'fechaSeleccionada' => date('Y-m-d')
        ]);
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'ciclo' => 'required|in:intensivo,ordinario_I,ordinario_II',
            'fecha' => 'required|date'
        ]);

        $estudiantes = Inscripcion::where('ciclo', $request->ciclo)
            ->orderBy('apellido_paterno')
            ->orderBy('apellido_materno')
            ->orderBy('nombres')
            ->get();

        $asistenciasRegistradas = Asistencia::whereDate('fecha', $request->fecha)
            ->where('ciclo', $request->ciclo)
            ->get()
            ->keyBy('dni');

        return view('asistencias.index', [
            'estudiantes' => $estudiantes,
            'cicloSeleccionado' => $request->ciclo,
            'fechaSeleccionada' => $request->fecha,
            'asistenciasRegistradas' => $asistenciasRegistradas,
            'asistenciaRegistrada' => $asistenciasRegistradas->isNotEmpty()
        ]);
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'ciclo' => 'required|in:intensivo,ordinario_I,ordinario_II',
            'fecha' => 'required|date',
            'estudiantes' => 'required|array',
            'estudiantes.*.dni' => 'required|string',
            'estudiantes.*.asistencia' => 'required|in:P,A,T'
        ]);

        $existeAsistencia = Asistencia::whereDate('fecha', $request->fecha)
            ->where('ciclo', $request->ciclo)
            ->exists();

        if ($existeAsistencia) {
            return redirect()->route('asistencias.index')
                ->withInput()
                ->with('error', 'La asistencia para esta fecha y ciclo ya fue registrada anteriormente.');
        }

        DB::beginTransaction();
        try {
            $now = now();
            $asistencias = [];
            $estudiantesConInasistencia = [];

            foreach ($request->estudiantes as $estudiante) {
                $asistencias[] = [
                    'dni' => $estudiante['dni'],
                    'apellido_paterno' => $estudiante['apellido_paterno'],
                    'apellido_materno' => $estudiante['apellido_materno'],
                    'nombres' => $estudiante['nombres'],
                    'ciclo' => $request->ciclo,
                    'programa' => $estudiante['programa_estudios'],
                    'fecha' => $request->fecha,
                    'estado' => $estudiante['asistencia'],
                    'created_at' => $now,
                    'updated_at' => $now
                ];

                if (in_array($estudiante['asistencia'], ['A', 'T'])) {
                    $estudiantesConInasistencia[] = [
                        'dni' => $estudiante['dni'],
                        'nombre_completo' => $estudiante['apellido_paterno'] . ' ' . $estudiante['apellido_materno'] . ' ' . $estudiante['nombres'],
                        'estado' => $estudiante['asistencia'],
                        'fecha' => $request->fecha
                    ];
                }
            }

            Asistencia::insert($asistencias);
            DB::commit();

            if (!empty($estudiantesConInasistencia)) {
                session(['estudiantes_con_inasistencia' => $estudiantesConInasistencia]);
            }

            return redirect()->route('asistencias.index')
                ->with('success', 'Asistencia registrada correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Ocurrió un error al registrar la asistencia: ' . $e->getMessage());
        }
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'dni' => 'required|string',
            'fecha' => 'required|date',
            'estado' => 'required|in:P,A,T'
        ]);

        try {
            $asistencia = Asistencia::where('dni', $request->dni)
                ->whereDate('fecha', $request->fecha)
                ->firstOrFail();

            $asistencia->update(['estado' => $request->estado]);

            return response()->json([
                'success' => true,
                'message' => 'Asistencia actualizada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
