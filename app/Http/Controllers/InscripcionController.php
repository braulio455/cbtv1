<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class InscripcionController extends Controller
{
    public function create()
    {
        $programas = DB::table('programas')->get();
        return view('inscripciones.create', compact('programas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'dni' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|in:masculino,femenino',
            'watsap_propio' => 'required|string|max:20',
            'watsap_apoderado' => 'required|string|max:20',
            'parentesco' => 'required|string|max:50',
            'programa_estudios' => 'required|string|exists:programas,nombre',
            'colegio_procedencia' => 'required|string|max:255',
            'ciclo' => 'required|string|in:intensivo,ordinario_I,ordinario_II',
            'departamento' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'distrito' => 'required|string|max:100',
            'numero_recibo' => 'required|string|max:100',
            'fecha_pago' => 'required|date',
            'monto_pagado' => 'required|numeric|min:0',
            'como_se_entero' => 'required|string|in:amigos_familiares,redes_sociales,radio_tv,volantes,ferias,otro',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'estado_pago' => 'required|string|in:pago_completado,pago_pendiente',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fechaNacimiento = Carbon::parse($request->fecha_nacimiento);
        if ($fechaNacimiento->diffInYears(now()) < 15) {
            return redirect()->back()
                ->with('error', 'La fecha de nacimiento indica que el alumno tiene menos de 15 años.')
                ->withInput();
        }

        $fechaPago = Carbon::parse($request->fecha_pago);
        if ($fechaPago->isAfter(now())) {
            return redirect()->back()
                ->with('error', 'La fecha de pago no puede ser posterior a la fecha actual.')
                ->withInput();
        }

        $existe = Inscripcion::where('dni', $request->dni)
            ->where('ciclo', $request->ciclo)
            ->exists();

        if ($existe) {
            return redirect()->back()
                ->with('error', 'Este DNI ya está registrado en el mismo ciclo.')
                ->withInput();
        }

        try {
            DB::beginTransaction();
            $inscripcionData = $request->all();
            if ($request->hasFile('foto_perfil')) {
                $file = $request->file('foto_perfil');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/fotos_perfil', $filename);
                $inscripcionData['foto_perfil'] = $filename;
            }
            Inscripcion::create($inscripcionData);
            DB::commit();
            return redirect()->route('inscripciones.create')->with('success', 'Inscripción guardada correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al guardar la inscripción: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        if ($inscripcion->estado_pago !== 'pago_pendiente') {
            return redirect()->back()->with('error', 'Solo se pueden actualizar inscripciones con estado "pago pendiente".');
        }

        $validator = Validator::make($request->all(), [
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'dni' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|in:masculino,femenino',
            'watsap_propio' => 'required|string|max:20',
            'watsap_apoderado' => 'required|string|max:20',
            'parentesco' => 'required|string|max:50',
            'programa_estudios' => 'required|string|exists:programas,nombre',
            'colegio_procedencia' => 'required|string|max:255',
            'ciclo' => 'required|string|in:intensivo,ordinario_I,ordinario_II',
            'departamento' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'distrito' => 'required|string|max:100',
            'numero_recibo' => 'required|string|max:100',
            'fecha_pago' => 'required|date',
            'monto_pagado' => 'required|numeric|min:0',
            'como_se_entero' => 'required|string|in:amigos_familiares,redes_sociales,radio_tv,volantes,ferias,otro',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'estado_pago' => 'required|string|in:pago_completado,pago_pendiente',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fechaNacimiento = Carbon::parse($request->fecha_nacimiento);
        if ($fechaNacimiento->diffInYears(now()) < 15) {
            return redirect()->back()
                ->with('error', 'La fecha de nacimiento indica que el alumno tiene menos de 15 años.')
                ->withInput();
        }

        $fechaPago = Carbon::parse($request->fecha_pago);
        if ($fechaPago->isAfter(now())) {
            return redirect()->back()
                ->with('error', 'La fecha de pago no puede ser posterior a la fecha actual.')
                ->withInput();
        }

        $existe = Inscripcion::where('dni', $request->dni)
            ->where('ciclo', $request->ciclo)
            ->where('id', '!=', $id)
            ->exists();

        if ($existe) {
            return redirect()->back()
                ->with('error', 'Ya existe otra inscripción con el mismo DNI en ese ciclo.')
                ->withInput();
        }

        try {
            DB::beginTransaction();
            $data = $request->except('foto_perfil');
            if ($request->hasFile('foto_perfil')) {
                $file = $request->file('foto_perfil');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/fotos_perfil', $filename);
                $data['foto_perfil'] = $filename;
            }
            $inscripcion->update($data);
            DB::commit();
            return redirect()->route('inscripciones.create')->with('success', 'Inscripción actualizada correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al actualizar la inscripción: ' . $e->getMessage());
        }
    }

    public function searchByDni(Request $request)
    {
        $request->validate(['dni' => 'required|string|max:20']);
        $dni = $request->input('dni');
        $inscripciones = Inscripcion::where('dni', $dni)->get();
        if ($inscripciones->isEmpty()) {
            return redirect()->back()->with('info', 'No se encontraron registros con el DNI proporcionado.');
        }
        return view('inscripciones.results', compact('inscripciones'));
    }

    public function index()
    {
        $inscripciones = Inscripcion::latest()->paginate(10);
        return view('inscripciones.index', compact('inscripciones'));
    }
}
