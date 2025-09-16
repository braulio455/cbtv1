<?php

// app/Http/Controllers/ReporteController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Asistencia;
use App\Models\Docente;
use Carbon\Carbon;

class ReporteController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    public function filtrar(Request $request)
    {
        $tipo = $request->input('tipo');
        $ciclo = $request->input('ciclo');
        $dni = $request->input('dni');

        if ($tipo == 'inscripciones') {
            $query = Inscripcion::query();
        } elseif ($tipo == 'asistencias') {
            $query = Asistencia::query();
        } elseif ($tipo == 'docentes') {
            $query = Docente::query();
        } else {
            return redirect()->back()->with('error', 'Tipo no válido');
        }

        if ($ciclo) {
            $query->where('ciclo', $ciclo);
        }

        if ($dni) {
            $query->where('dni', $dni);
        }

        $datos = $query->get();
        $fechaActual = Carbon::now()->format('Y-m-d');

        return view('reportes.resultados', compact('datos', 'tipo', 'fechaActual'));
    }

    public function generarPDF(Request $request)
    {
        $tipo = $request->input('tipo');
        $ciclo = $request->input('ciclo');
        $dni = $request->input('dni');

        if ($tipo == 'inscripciones') {
            $query = Inscripcion::query();
        } elseif ($tipo == 'asistencias') {
            $query = Asistencia::query();
        } elseif ($tipo == 'docentes') {
            $query = Docente::query();
        } else {
            return redirect()->back()->with('error', 'Tipo no válido');
        }

        if ($ciclo) {
            $query->where('ciclo', $ciclo);
        }

        if ($dni) {
            $query->where('dni', $dni);
        }

        $datos = $query->get();
        $fechaActual = Carbon::now()->format('Y-m-d');

        return view('reportes.pdf', compact('datos', 'tipo', 'fechaActual'));
    }
}
