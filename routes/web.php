<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\InscripcionController;
    use App\Http\Controllers\PagoPendienteController;
    use App\Http\Controllers\AsistenciaController;
    use App\Http\Controllers\PreinscripcionController;
use App\Http\Controllers\ReporteController;



// ✅ RUTA PÚBLICA (solo el landing)
Route::get('/', fn() => view('landing'))->name('landing');

// ✅ Rutas de autenticación (solo si NO está autenticado)
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.post');

        Route::get('/register', 'showRegisterForm')->name('register');
        Route::post('/register', 'register')->name('register.post');

        Route::get('/reset', 'showResetForm')->name('reset');
        Route::post('/reset', 'reset')->name('reset.post');

        Route::get('/verify', 'showVerifyForm')->name('verify');
        Route::post('/verify', 'verify')->name('verify.post');

        Route::get('/verify-reset', 'showVerifyResetForm')->name('verify.reset');
        Route::post('/verify-reset', 'verifyReset')->name('verify.reset.post');
    });
});

// ✅ Rutas protegidas (solo si está autenticado)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Grupos y Programas
    Route::prefix('grupos')->controller(GrupoController::class)->group(function () {
        Route::get('/', 'index')->name('grupos.index');
        Route::post('/', 'store')->name('grupos.store');
        Route::put('/{grupo}', 'update')->name('grupos.update');
        Route::delete('/{grupo}', 'destroy')->name('grupos.destroy');

        Route::prefix('{grupo}/programas')->group(function () {
            Route::post('/', 'storePrograma')->name('programas.store');
            Route::put('/{programa}', 'updatePrograma')->name('programas.update');
            Route::delete('/{programa}', 'destroyPrograma')->name('programas.destroy');
        });
    });

    // Inscripciones
    Route::prefix('inscripciones')->controller(InscripcionController::class)->group(function () {
        Route::get('/create', 'create')->name('inscripciones.create');
        Route::post('/', 'store')->name('inscripciones.store');
    });

    // Asignaturas
    Route::prefix('asignaturas')->controller(AsignaturaController::class)->group(function () {
        Route::get('/', 'index')->name('asignaturas.index');
        Route::post('/', 'store')->name('asignaturas.store');
        Route::put('/{asignatura}', 'update')->name('asignaturas.update');
        Route::delete('/{asignatura}', 'destroy')->name('asignaturas.destroy');
    });

    // Docentes
    Route::prefix('docentes')->controller(DocenteController::class)->group(function () {
        Route::get('/', 'index')->name('docentes.index');
        Route::post('/', 'store')->name('docentes.store');
        Route::put('/{docente}', 'update')->name('docentes.update');
        Route::delete('/{docente}', 'destroy')->name('docentes.destroy');
        Route::post('/{docente}/asignar', 'asignarAsignaturas')->name('docentes.asignar');
        Route::delete('/asignacion/{id}', 'eliminarAsignacion')->name('docentes.eliminarAsignacion');
    });

    // Imágenes
    Route::prefix('imagenes')->controller(ImagenController::class)->group(function () {
        Route::get('/subir', 'formulario')->name('imagen.formulario');
        Route::post('/subir', 'subir')->name('imagen.subir');
        Route::get('/', 'listar')->name('imagen.listar');
    });

//pagos

Route::prefix('pagos')->group(function() {
    Route::get('/buscar', [PagoPendienteController::class, 'form'])->name('pagos.form');
    Route::post('/buscar', [PagoPendienteController::class, 'buscar'])->name('pagos.buscar');
    Route::get('/editar/{id}', [PagoPendienteController::class, 'editar'])->name('pagos.editar');
    Route::post('/actualizar/{id}', [PagoPendienteController::class, 'actualizar'])->name('pagos.actualizar');
    Route::get('/foto/{filename}', [PagoPendienteController::class, 'mostrarFoto'])->name('pagos.foto');
});

//asistencias

Route::prefix('asistencias')->group(function() {
    Route::get('/', [AsistenciaController::class, 'index'])->name('asistencias.index');
    Route::post('/buscar', [AsistenciaController::class, 'buscar'])->name('asistencias.buscar');
    Route::post('/guardar', [AsistenciaController::class, 'guardar'])->name('asistencias.guardar');
    Route::post('/actualizar', [AsistenciaController::class, 'actualizar'])->name('asistencias.actualizar');
});

//reportes

Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::get('/reportes/filtrar', [ReporteController::class, 'filtrar'])->name('reportes.filtrar');
Route::get('/reportes/pdf', [ReporteController::class, 'generarPDF'])->name('reportes.pdf');
});

//preinscripciones



Route::get('/preinscripciones', [PreinscripcionController::class, 'index'])->name('preinscripciones.index');
Route::get('/preinscripciones/create', [PreinscripcionController::class, 'create'])->name('preinscripciones.create');
Route::post('/preinscripciones', [PreinscripcionController::class, 'store'])->name('preinscripciones.store');
Route::get('/preinscripciones/aprobar/{id}', [PreinscripcionController::class, 'aprobar'])->name('preinscripciones.aprobar');
Route::get('/preinscripciones/rechazar/{id}', [PreinscripcionController::class, 'rechazar'])->name('preinscripciones.rechazar');

// Rutas para notificaciones separadas
Route::get('/preinscripciones/notificar-admin', [PreinscripcionController::class, 'notificarAdmin'])->name('preinscripciones.notificar-admin');
Route::get('/preinscripciones/notificar-estudiante', [PreinscripcionController::class, 'notificarEstudiante'])->name('preinscripciones.notificar-estudiante');

Route::get('/landing', function () {
    return view('landing');
})->name('landing');


    
//falta implementar,notas,estadisticas
