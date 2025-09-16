<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    :root {
      --vino: #8B2E44;
      --vino-oscuro: #6a1d32;
      --dorado: #D4AF37;
      --plata: #C0C0C0;
      --mostaza: #E1B339;
      --gris-fondo: #f4f4f4;
      --radius: 12px;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    body {
      background-color: var(--gris-fondo);
      padding: 2rem;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }

    h5, h6 {
      color: var(--vino);
      font-weight: 700;
      border-left: 5px solid var(--dorado);
      padding-left: 10px;
    }

    .btn-vino {
      background-color: var(--vino);
      color: white;
      font-weight: 600;
      border-radius: var(--radius);
      border: none;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .btn-vino:hover {
      background-color: var(--vino-oscuro);
    }

    .btn-mostaza {
      background-color: var(--mostaza);
      color: #fff;
      font-weight: 600;
      border-radius: var(--radius);
      border: none;
    }

    .btn-mostaza:hover {
      background-color: #cc9c1d;
    }

    .form-control {
      border-radius: var(--radius);
      border: 1px solid var(--plata);
      padding: 0.6rem 1rem;
      background-color: white;
    }

    .form-control:focus {
      border-color: var(--dorado);
      box-shadow: 0 0 0 0.15rem rgba(212, 175, 55, 0.25);
    }

    .card {
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      background-color: white;
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .accordion-button {
      background-color: var(--plata);
      color: var(--vino);
      font-weight: 600;
      font-size: 1rem;
      border: none;
    }

    .accordion-button:not(.collapsed) {
      background-color: var(--vino);
      color: white;
    }

    .accordion-item {
      border-radius: var(--radius);
      border: 1px solid var(--plata);
      margin-bottom: 1rem;
      overflow: hidden;
    }

    .asignatura-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.75rem 1rem;
      border-radius: var(--radius);
      border: 1px solid var(--plata);
      background-color: #fff;
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
    }

    .alert {
      border-left: 5px solid var(--vino);
      border-radius: var(--radius);
    }

    .btn-outline-danger {
      border-radius: var(--radius);
    }

    .form-check-input:checked {
      background-color: var(--vino);
      border-color: var(--vino);
    }

    .text-vino {
      color: var(--vino);
    }

    .btn-delete {
      background-color: var(--dorado);
      color: #fff;
      border: none;
      padding: 4px 10px;
      border-radius: 6px;
    }

    .btn-delete:hover {
      background-color: #bfa22a;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- ALERTAS -->
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>✅ ¡Éxito!</strong><br>
        @if (session('action') === 'store')
          El docente ha sido registrado correctamente.
        @elseif (session('action') === 'update')
          Los datos del docente han sido actualizados correctamente.
        @elseif (session('action') === 'delete')
          El docente ha sido eliminado correctamente.
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    @endif

    @if (session('info'))
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>ℹ️ Información:</strong><br>{{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>⚠️ Error:</strong> Se encontraron errores al validar el formulario. Por favor, revisa los campos ingresados.
        <ul class="mb-0 mt-2">
          @foreach ($errors->all() as $error)
            <li>• {{ str_replace(['ya ha sido tomado', 'ya está en uso', 'ya esta tomado'], ['ya está registrado', 'ya está en uso', 'ya está registrado'], $error) }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    @endif

    <!-- BOTÓN MOSTRAR -->
    <div class="text-end mb-3">
      <button class="btn btn-mostaza" type="button" data-bs-toggle="collapse" data-bs-target="#listaDocentes">
        👁 Mostrar Docentes
      </button>
    </div>

    <!-- REGISTRO -->
    <div class="card">
      <h5>➕ Registrar nuevo docente</h5>
      <form method="POST" action="{{ route('docentes.store') }}" class="row g-3">
        @csrf
        <div class="col-md-3">
          <input name="nombres" class="form-control" placeholder="Nombres" required value="{{ old('nombres') }}">
        </div>
        <div class="col-md-3">
          <input name="apellidos" class="form-control" placeholder="Apellidos" required value="{{ old('apellidos') }}">
        </div>
        <div class="col-md-2">
          <input name="dni" class="form-control" placeholder="DNI (8 dígitos)" required pattern="\d{8}" title="El DNI debe tener exactamente 8 dígitos" value="{{ old('dni') }}">
        </div>
        <div class="col-md-2">
          <input name="telefono" class="form-control" placeholder="Teléfono (9 dígitos)" required pattern="\d{9}" title="El teléfono debe tener exactamente 9 dígitos" value="{{ old('telefono') }}">
        </div>
        <div class="col-md-4">
          <input name="direccion" class="form-control" placeholder="Dirección" required value="{{ old('direccion') }}">
        </div>
        <div class="col-md-4">
          <input name="especialidad" class="form-control" placeholder="Especialidad" required value="{{ old('especialidad') }}">
        </div>
        <div class="col-md-4">
          <input type="email" name="correo_electronico" class="form-control" placeholder="Correo Electrónico" required value="{{ old('correo_electronico') }}">
        </div>
        <div class="col-md-2">
          <button class="btn btn-vino w-100">✓ Registrar</button>
        </div>
      </form>
    </div>

    <!-- DOCENTES -->
    <div class="collapse" id="listaDocentes">
      <div class="accordion" id="accordionDocentes">
        @foreach($docentes as $docente)
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading{{ $docente->id }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $docente->id }}">
              {{ $docente->nombres }} {{ $docente->apellidos }} - DNI: {{ $docente->dni }}
            </button>
          </h2>
          <div id="collapse{{ $docente->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionDocentes">
            <div class="accordion-body">
              <p><strong>📧 Especialidad:</strong> {{ $docente->especialidad }}
                <strong>📞 Tel:</strong> {{ $docente->telefono }}
                <strong>📍 Dir:</strong> {{ $docente->direccion }}</p>

              <!-- FORM EDITAR -->
              <form method="POST" action="{{ route('docentes.update', $docente) }}" class="row g-2 mb-3">
                @csrf
                @method('PUT')
                <div class="col-md-3"><input name="nombres" class="form-control" value="{{ $docente->nombres }}" required></div>
                <div class="col-md-3"><input name="apellidos" class="form-control" value="{{ $docente->apellidos }}" required></div>
                <div class="col-md-2"><input name="dni" class="form-control" value="{{ $docente->dni }}" required></div>
                <div class="col-md-2"><input name="telefono" class="form-control" value="{{ $docente->telefono }}" required></div>
                <div class="col-md-4"><input name="direccion" class="form-control" value="{{ $docente->direccion }}" required></div>
                <div class="col-md-4"><input name="especialidad" class="form-control" value="{{ $docente->especialidad }}" required></div>
                <div class="col-md-4"><input name="correo_electronico" class="form-control" value="{{ $docente->correo_electronico }}" required></div>
                <div class="col-md-2">
                  <button class="btn btn-mostaza w-100">✏️ Guardar</button>
                </div>
              </form>

              <!-- ASIGNACIÓN -->
              <form method="POST" action="{{ route('docentes.asignar', $docente) }}">
                @csrf
                <div class="border p-3 rounded bg-white mb-3" style="max-height: 300px; overflow-y: auto;">
                  @foreach($grupos as $grupo)
                    <div class="mb-2">
                      <strong class="text-secondary">Grupo: {{ $grupo->nombre }}</strong>
                      <div class="row">
                        @foreach($grupo->asignaturas as $asig)
                          <div class="col-md-6">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="asignaturas[]" value="{{ $asig->id }}" id="asig{{ $docente->id }}-{{ $asig->id }}" {{ $docente->asignaturas->contains($asig->id) ? 'checked' : '' }}>
                              <label class="form-check-label" for="asig{{ $docente->id }}-{{ $asig->id }}">
                                {{ $asig->nombre }}
                              </label>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  @endforeach
                </div>
                <button class="btn btn-success w-100">💾 Guardar Asignaciones</button>
              </form>

              <!-- ASIGNACIONES ACTUALES -->
              @if($docente->asignaturas->count())
                <div class="mt-3">
                  <h6 class="text-vino">📚 Asignaciones actuales:</h6>
                  @foreach($docente->asignaturas as $asig)
                    <div class="asignatura-item">
                      <span>{{ $asig->grupo->nombre }} → {{ $asig->nombre }}</span>
                      <form method="POST" action="{{ route('docentes.eliminarAsignacion', $asig->pivot->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete btn-sm">×</button>
                      </form>
                    </div>
                  @endforeach
                </div>
              @endif

              <!-- ELIMINAR -->
              <form method="POST" action="{{ route('docentes.destroy', $docente) }}" class="mt-3 text-end" onsubmit="return confirm('¿Eliminar docente y sus asignaciones?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">🗑️ Eliminar docente</button>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
