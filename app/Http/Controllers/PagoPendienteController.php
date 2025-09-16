<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PagoPendienteController extends Controller
{
    public function form()
    {
        return view('pagos.buscar');
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|size:8|regex:/^[0-9]+$/',
            'ciclo' => 'required|in:intensivo,ordinario_I,ordinario_II'
        ]);

        $resultados = Inscripcion::where('dni', $request->dni)
            ->where('ciclo', $request->ciclo)
            ->where('estado_pago', 'pago_pendiente')
            ->get();

        return view('pagos.buscar', [
            'resultados' => $resultados,
            'search_dni' => $request->dni,
            'search_ciclo' => $request->ciclo
        ]);
    }

    public function editar($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        
        if ($inscripcion->estado_pago !== 'pago_pendiente') {
            return redirect()->route('pagos.form')
                   ->with('error', 'Esta inscripción ya fue actualizada.');
        }

        return view('pagos.buscar', ['inscripcion' => $inscripcion]);
    }

    public function actualizar(Request $request, $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);

        if ($inscripcion->estado_pago !== 'pago_pendiente') {
            return redirect()->route('pagos.form')
                   ->with('error', 'Esta inscripción ya fue actualizada.');
        }

        $validator = Validator::make($request->all(), [
            'foto_perfil' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            if ($request->hasFile('foto_perfil')) {
                $file = $request->file('foto_perfil');
                $filename = 'perfil_'.$inscripcion->dni.'_'.time().'.'.$file->extension();
                
                // Guardar en storage/private/public/fotos_perfil
                $path = $file->storeAs('private/public/fotos_perfil', $filename);
                
                // Eliminar foto anterior si existe
                if ($inscripcion->foto_perfil) {
                    Storage::delete('private/public/fotos_perfil/'.$inscripcion->foto_perfil);
                }
                
                $inscripcion->foto_perfil = $filename;
            }

            $inscripcion->estado_pago = 'pago_completado';
            $inscripcion->save();

            DB::commit();
            
            return redirect()->route('pagos.form')
                   ->with('success', 'Pago completado exitosamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al actualizar: '.$e->getMessage());
        }
    }

    // Método para mostrar la imagen
    public function mostrarFoto($filename)
    {
        $path = 'private/public/fotos_perfil/'.$filename;
        
        if (!Storage::exists($path)) {
            abort(404);
        }

        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        return response($file, 200)->header('Content-Type', $type);
    }
}