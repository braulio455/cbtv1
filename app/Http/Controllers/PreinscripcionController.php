<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PreinscripcionController extends Controller
{
    /**
     * Muestra el listado de preinscripciones pendientes
     */
    public function index()
    {
        $search = request('search');
        $preinscripciones = Preinscripcion::when($search, function($query) use ($search) {
            return $query->where('dni', 'like', "%$search%")
                        ->orWhere('nombres', 'like', "%$search%")
                        ->orWhere('apellido_paterno', 'like', "%$search%");
        })->where('estado', 'pendiente')->get();
        
        return view('preinscripciones.index', compact('preinscripciones'));
    }

    /**
     * Muestra el formulario de creación de preinscripción
     */
    public function create()
    {
        $programas = DB::table('programas')->get();
        return view('preinscripciones.create', compact('programas'));
    }

    /**
     * Almacena una nueva preinscripción y notifica al administrador
     */
    public function store(Request $request)
    {
        $maxFechaNacimiento = Carbon::now()->subYears(15)->format('Y-m-d');
        
        $validatedData = $request->validate([
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'dni' => 'required|digits:8|unique:preinscripciones,dni,NULL,id,ciclo,'.$request->ciclo,
            'fecha_nacimiento' => 'required|date|before_or_equal:'.$maxFechaNacimiento,
            'sexo' => 'required|in:masculino,femenino',
            'foto_perfil' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'watsap_propio' => 'required|digits:9',
            'watsap_apoderado' => 'required|digits:9',
            'parentesco' => 'required|string|max:50',
            'programa_estudios' => 'required|string|max:255',
            'colegio_procedencia' => 'required|string|max:255',
            'ciclo' => 'required|in:intensivo,ordinario_I,ordinario_II',
            'departamento' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'distrito' => 'required|string|max:100',
            'numero_recibo' => 'required|string|max:100|unique:preinscripciones',
            'fecha_pago' => 'required|date|before_or_equal:today',
            'monto_pagado' => 'required|numeric|min:0',
            'estado_pago' => 'required|in:pago_completado,pago_pendiente',
            'como_se_entero' => 'required|in:amigos_familiares,redes_sociales,radio_tv,volantes,ferias,otro',
        ]);

        // Guardar foto de perfil
        if ($request->hasFile('foto_perfil')) {
            $path = $request->file('foto_perfil')->store('public/fotos_perfil');
            $validatedData['foto_perfil'] = str_replace('public/', 'storage/', $path);
        }

        $validatedData['estado'] = 'pendiente';
        $preinscripcion = Preinscripcion::create($validatedData);

        // Mensaje predeterminado para el administrador
        $mensajeAdmin = $this->generarMensajeAdmin($preinscripcion);

        return redirect()->route('preinscripciones.notificar-admin', [
            'mensaje' => urlencode($mensajeAdmin),
            'telefono' => '910554546', // Número fijo del administrador
            'success' => "¡Preinscripción registrada con éxito! 🎉\n\n" .
                         "Hemos recibido tu solicitud para el programa de {$preinscripcion->programa_estudios}.\n\n" .
                         "Recibirás una respuesta en un plazo máximo de 24 horas hábiles."
        ]);
    }

    /**
     * Aprueba una preinscripción y notifica al estudiante
     */
    public function aprobar($id)
    {
        $preinscripcion = Preinscripcion::findOrFail($id);
        
        // Validar que tenga foto de perfil
        if (empty($preinscripcion->foto_perfil)) {
            return redirect()->back()->with('error', 'No se puede aprobar la preinscripción sin foto de perfil.');
        }

        // Crear registro de inscripción
        $inscripcionData = $preinscripcion->toArray();
        unset($inscripcionData['id'], $inscripcionData['created_at'], $inscripcionData['updated_at']);
        Inscripcion::create($inscripcionData);

        // Actualizar estado
        $preinscripcion->update(['estado' => 'aprobado']);

        // Mensaje predeterminado para el estudiante
        $mensajeEstudiante = $this->generarMensajeAprobacion($preinscripcion);

        return redirect()->route('preinscripciones.notificar-estudiante', [
            'mensaje' => urlencode($mensajeEstudiante),
            'telefono' => $preinscripcion->watsap_propio,
            'success' => "Preinscripción aprobada correctamente. Por favor envía el mensaje de confirmación al estudiante.",
            'back_url' => route('preinscripciones.index')
        ]);
    }

    /**
     * Rechaza una preinscripción y notifica al estudiante
     */
    public function rechazar($id)
    {
        $preinscripcion = Preinscripcion::findOrFail($id);
        $preinscripcion->update(['estado' => 'rechazado']);

        // Mensaje predeterminado para el estudiante
        $mensajeEstudiante = $this->generarMensajeRechazo($preinscripcion);

        return redirect()->route('preinscripciones.notificar-estudiante', [
            'mensaje' => urlencode($mensajeEstudiante),
            'telefono' => $preinscripcion->watsap_propio,
            'success' => "Preinscripción rechazada correctamente. Por favor envía el mensaje al estudiante.",
            'back_url' => route('preinscripciones.index')
        ]);
    }

    /**
     * Muestra la pantalla para notificar al administrador
     */
    public function notificarAdmin(Request $request)
    {
        $urlWhatsApp = "https://wa.me/51{$request->telefono}?text={$request->mensaje}";
        
        return view('preinscripciones.notificar-admin', [
            'urlWhatsApp' => $urlWhatsApp,
            'success' => $request->success
        ]);
    }

    /**
     * Muestra la pantalla para notificar al estudiante
     */
    public function notificarEstudiante(Request $request)
    {
        $urlWhatsApp = "https://wa.me/51{$request->telefono}?text={$request->mensaje}";
        
        return view('preinscripciones.notificar-estudiante', [
            'urlWhatsApp' => $urlWhatsApp,
            'success' => $request->success,
            'back_url' => $request->back_url ?? url()->previous()
        ]);
    }

    /**
     * Genera el mensaje para el administrador cuando se crea una preinscripción
     */
    private function generarMensajeAdmin($preinscripcion)
    {
        return "📋 *NUEVA PREINSCRIPCIÓN POR VALIDAR* 📋\n\n" .
               "👤 *Datos del Estudiante:*\n" .
               "• Nombre completo: {$preinscripcion->nombres} {$preinscripcion->apellido_paterno} {$preinscripcion->apellido_materno}\n" .
               "• DNI: {$preinscripcion->dni}\n" .
               "• F. Nacimiento: " . Carbon::parse($preinscripcion->fecha_nacimiento)->format('d/m/Y') . "\n" .
               "• WhatsApp: 51{$preinscripcion->watsap_propio}\n\n" .
               "🎓 *Información Académica:*\n" .
               "• Programa: {$preinscripcion->programa_estudios}\n" .
               "• Ciclo: " . $this->formatearCiclo($preinscripcion->ciclo) . "\n" .
               "• Colegio: {$preinscripcion->colegio_procedencia}\n\n" .
               "💰 *Información de Pago:*\n" .
               "• Recibo: {$preinscripcion->numero_recibo}\n" .
               "• Monto: S/ " . number_format($preinscripcion->monto_pagado, 2) . "\n" .
               "• Estado: " . ($preinscripcion->estado_pago == 'pago_completado' ? 'Completado' : 'Pendiente') . "\n\n" .
               "📅 *Fecha de registro:* " . $preinscripcion->created_at->format('d/m/Y H:i') . "\n\n" .
               "⚠️ *Acción requerida:*\n" .
               "Por favor revisa esta preinscripción en el sistema y procede con su validación.";
    }

    /**
     * Genera el mensaje para el estudiante cuando se aprueba
     */
    private function generarMensajeAprobacion($preinscripcion)
    {
        return "🎉 *¡FELICITACIONES! PREINSCRIPCIÓN APROBADA* 🎉\n\n" .
               "Estimado(a) {$preinscripcion->nombres},\n\n" .
               "Nos complace informarte que tu preinscripción al programa *{$preinscripcion->programa_estudios}* ha sido *APROBADA*.\n\n" .
               "📌 *Detalles de tu inscripción:*\n" .
               "• Programa: {$preinscripcion->programa_estudios}\n" .
               "• Ciclo: " . $this->formatearCiclo($preinscripcion->ciclo) . "\n" .
               "• Fecha de aprobación: " . now()->format('d/m/Y') . "\n\n" .
               "📋 *Siguientes pasos:*\n" .
               "1. Revisa tu correo electrónico para los documentos requeridos\n" .
               "2. Asiste a la charla de bienvenida (te enviaremos fecha y hora)\n" .
               "3. Prepara tus materiales de estudio\n\n" .
               "¡Bienvenido(a) a nuestra institución educativa!\n\n" .
               "Para cualquier consulta, no dudes en comunicarte con nosotros.\n\n" .
               "📱 *Contacto:*\n" .
               "WhatsApp: 51910554546";
    }

    /**
     * Genera el mensaje para el estudiante cuando se rechaza
     */
    private function generarMensajeRechazo($preinscripcion)
    {
        return "📢 *RESPUESTA A TU SOLICITUD DE PREINSCRIPCIÓN* 📢\n\n" .
               "Estimado(a) {$preinscripcion->nombres},\n\n" .
               "Lamentamos informarte que tu preinscripción al programa *{$preinscripcion->programa_estudios}* no ha podido ser aprobada en esta oportunidad.\n\n" .
               "📌 *Posibles motivos:*\n" .
               "• Documentación incompleta o incorrecta\n" .
               "• Cupos agotados para el ciclo seleccionado\n" .
               "• No cumplimiento de requisitos básicos\n\n" .
               "💡 *Opciones disponibles:*\n" .
               "• Puedes contactar al área de admisiones para más detalles\n" .
               "• Revisar los requisitos y volver a aplicar en el siguiente ciclo\n\n" .
               "Agradecemos tu interés en nuestra institución y quedamos atentos a cualquier consulta.\n\n" .
               "📱 *Contacto:*\n" .
               "WhatsApp: 51910554546";
    }

    /**
     * Formatea el nombre del ciclo para mostrarlo correctamente
     */
    private function formatearCiclo($ciclo)
    {
        switch($ciclo) {
            case 'intensivo': return 'Intensivo';
            case 'ordinario_I': return 'Ordinario I';
            case 'ordinario_II': return 'Ordinario II';
            default: return $ciclo;
        }
    }
}