<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --vino: #7b2639;
      --vino-hover: #5a1927;
      --oro: #d4af37;
      --oro-hover: #f5e293;
      --crema: #fdf8f0;
      --gris: #f1f1f1;
      --text: #333;
    }

    body {
      background-color: var(--crema);
      font-family: 'Segoe UI', sans-serif;
      color: var(--text);
      padding: 2rem;
    }

    .btn-vino {
      background-color: var(--vino);
      color: #fff;
      font-weight: 600;
      border: none;
    }

    .btn-vino:hover {
      background-color: var(--vino-hover);
    }

    .btn-oro {
      background-color: var(--oro);
      color: #000;
      font-weight: 600;
      border: none;
    }

    .btn-oro:hover {
      background-color: var(--oro-hover);
    }

    .card {
      border: 1px solid var(--oro);
      border-radius: 1rem;
      background: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .card-header {
      background-color: var(--vino);
      color: #fff;
      font-size: 1.1rem;
      font-weight: bold;
      border-bottom: 3px solid var(--oro);
    }

    .modal-header {
      background: var(--vino);
      color: #fff;
    }

    .modal-header .btn-close {
      filter: invert(1);
    }

    .table th {
      background: var(--vino-hover);
      color: #fff;
    }

    .alert {
      border-left: 4px solid var(--vino);
    }

    .gestion-form,
    .gestion-col {
      transition: 0.3s;
    }

    .program-card {
      border: 1px solid #ddd;
      padding: 0.8rem 1rem;
      border-radius: 0.75rem;
      background: #fff;
      box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.05);
      margin-bottom: 1rem;
    }

    .confirmation-message {
      position: fixed;
      top: 1rem;
      right: 1rem;
      z-index: 1050;
      display: none;
    }

  </style>
</head>
<body>
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-uppercase fw-bold text-vino">Gestión Académica</h2>
    <button class="btn btn-vino" onclick="toggleGestion()">
      <i class="bi bi-tools me-1"></i> Modo Gestión
    </button>
  </div>

  @foreach (['success', 'info', 'danger', 'error'] as $msg)
    @if(session($msg))
      <div class="alert alert-{{ $msg === 'error' ? 'danger' : $msg }} alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session($msg) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
  @endforeach

  @foreach($grupos as $grupo)
    <div class="card mb-4">
      <div class="card-header">
        Grupo: {{ $grupo->nombre }}
        @if($grupo->descripcion)
          <br><small class="fst-italic">{{ $grupo->descripcion }}</small>
        @endif
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('asignaturas.store') }}" class="row g-2 mb-4 gestion-form d-none">
          @csrf
          <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
          <div class="col-md-5">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre de asignatura" required>
          </div>
          <div class="col-md-5">
            <input type="text" name="descripcion" class="form-control" placeholder="Descripción (opcional)">
          </div>
          <div class="col-md-2 d-grid">
            <button class="btn btn-oro"><i class="bi bi-plus-circle me-1"></i> Añadir</button>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Asignatura</th>
                <th>Descripción</th>
                <th class="text-center gestion-col d-none">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse($grupo->asignaturas as $key => $asignatura)
                <tr>
                  <td class="text-center">{{ $key + 1 }}</td>
                  <td>{{ $asignatura->nombre }}</td>
                  <td>{{ $asignatura->descripcion ?: '—' }}</td>
                  <td class="text-center gestion-col d-none">
                    <button class="btn btn-sm btn-oro me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $asignatura->id }}">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <form method="POST" action="{{ route('asignaturas.destroy', $asignatura) }}" style="display:inline-block;">
                      @csrf @method('DELETE')
                      <button onclick="return confirm('¿Eliminar esta asignatura?')" class="btn btn-sm btn-danger">
                        <i class="bi bi-trash3"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center text-muted">No hay asignaturas registradas.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    @foreach($grupo->asignaturas as $asignatura)
      <div class="modal fade" id="editModal{{ $asignatura->id }}" tabindex="-1">
        <div class="modal-dialog">
          <form class="modal-content" method="POST" action="{{ route('asignaturas.update', $asignatura) }}">
            @csrf @method('PUT')
            <div class="modal-header">
              <h5 class="modal-title"><i class="bi bi-pencil-square me-1"></i> Editar Asignatura</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
              <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" value="{{ $asignatura->nombre }}" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control">{{ $asignatura->descripcion }}</textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button class="btn btn-vino">Guardar Cambios</button>
            </div>
          </form>
        </div>
      </div>
    @endforeach
  @endforeach

  <div id="confirmationMessage" class="alert alert-success confirmation-message" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i> <span id="confirmationText"></span>
  </div>
</div>

<script>
  function toggleGestion() {
    document.querySelectorAll('.gestion-form, .gestion-col').forEach(e => e.classList.toggle('d-none'));
  }

  function showConfirmation(message) {
    const el = document.getElementById('confirmationMessage');
    document.getElementById('confirmationText').textContent = message;
    el.style.display = 'block';
    setTimeout(() => el.style.display = 'none', 3000);
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
