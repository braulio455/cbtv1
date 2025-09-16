<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;

class ImagenController extends Controller
{
    public function formulario()
    {
        return view('subir');
    }

    public function subir(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|max:2048',
        ]);

        $archivo = $request->file('imagen');
        $nombreOriginal = $archivo->getClientOriginalName();
        $nombreNuevo = time() . '_' . $nombreOriginal;
        $archivo->move(public_path('imagenes'), $nombreNuevo);

        // Guardar en la base de datos
        Imagen::create([
            'nombre_original' => $nombreOriginal,
            'ruta' => 'imagenes/' . $nombreNuevo,
        ]);

        return redirect()->back()->with('success', 'Imagen subida correctamente.');
    }

    public function listar()
    {
        $imagenes = Imagen::all();
        return view('listar_imagenes', compact('imagenes'));
    }
}

