<!-- resources/views/grupos/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Grupos y Programas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-dorado: #d4af37;
            --color-dorado-oscuro: #b38e2f;
            --color-dorado-claro: #f8e8c8;
            --color-vino: #6a0f1a;
            --color-vino-suave: #8f2434;
            --color-gris-claro: #f9f9f9;
            --color-texto: #2f2f2f;
            --radius: 0.75rem;
        }

        body {
            background-color: var(--color-gris-claro);
            color: var(--color-texto);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            padding: 2rem;
        }

        .header, .card-header, .modal-header {
            background: linear-gradient(135deg, var(--color-vino-suave), var(--color-dorado-oscuro));
            color: white;
            padding: 1rem 2rem;
            border-bottom: 3px solid var(--color-dorado);
            border-radius: var(--radius) var(--radius) 0 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--color-dorado-oscuro);
            margin-bottom: 2rem;
        }

        .btn-vino {
            background: var(--color-vino);
            color: white;
            font-weight: 600;
            border-radius: var(--radius);
            padding: 0.5rem 1.25rem;
            border: none;
        }

        .btn-vino:hover {
            background: var(--color-vino-suave);
        }

        .btn-outline-gold {
            border: 1.5px solid var(--color-dorado);
            color: var(--color-dorado);
            font-weight: 600;
            border-radius: var(--radius);
            padding: 0.5rem 1.25rem;
        }

        .btn-outline-gold:hover {
            background: var(--color-dorado);
            color: white;
        }

        .form-label {
            font-weight: 600;
            color: var(--color-vino-suave);
        }

        .form-control, .form-select {
            border: 1.5px solid #ccc;
            border-radius: var(--radius);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--color-dorado);
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        }

        .alert {
            border-radius: var(--radius);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .modal-content {
            border-radius: var(--radius);
        }

        .dropdown-menu {
            border-radius: var(--radius);
            border: 1px solid var(--color-dorado);
        }

        .border-bottom {
            border-color: var(--color-dorado-oscuro) !important;
        }

        .gestion-section.d-none {
            display: none !important;
        }

        h2.section-title {
            color: var(--color-vino);
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        .btn i {
            margin-right: 6px;
        }

        .card-body p.text-muted {
            font-size: 0.95rem;
        }

        .programa-item {
            border-left: 4px solid var(--color-vino);
            background: #fffdf7;
            padding: 0.75rem 1rem;
            border-radius: var(--radius);
            margin-bottom: 0.75rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button id="toggleGestion" class="btn btn-outline-gold">
                <i class="fas fa-lock me-2"></i> Activar modo gestión
            </button>
        </div>

        @foreach (['success', 'info', 'danger'] as $msg)
            @if(session($msg))
                <div class="alert alert-{{ $msg }}">{{ session($msg) }}</div>
            @endif
        @endforeach

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="text-end mb-3 gestion-section d-none">
            <button class="btn btn-vino" data-bs-toggle="modal" data-bs-target="#modalNuevoGrupo">
                <i class="fas fa-plus-circle me-2"></i> Nuevo Grupo
            </button>
        </div>

        <!-- Modal Crear Grupo -->
        <div class="modal fade" id="modalNuevoGrupo" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('grupos.store') }}" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Crear Grupo</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre del Grupo</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-vino">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

        @foreach ($grupos as $grupo)
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $grupo->nombre }}</h5>
                    <div class="dropdown gestion-section d-none">
                        <button class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editarGrupo{{ $grupo->id }}">
                                    <i class="fas fa-edit me-2"></i>Editar
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('grupos.destroy', $grupo) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-trash me-2"></i>Eliminar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-body">
                    <p class="text-muted">{{ $grupo->descripcion }}</p>

                    @foreach ($grupo->programas as $programa)
                        <div class="d-flex justify-content-between border-bottom py-2">
                            <div>
                                <strong>{{ $programa->nombre }}</strong><br>
                                <small class="text-muted">{{ $programa->descripcion }}</small>
                            </div>
                            <div class="gestion-section d-none">
                                <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editarPrograma{{ $programa->id }}">Editar</a>
                                <form method="POST" action="{{ route('programas.destroy', ['grupo' => $grupo->id, 'programa' => $programa->id]) }}" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Editar Programa -->
                        <div class="modal fade" id="editarPrograma{{ $programa->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('programas.update', ['grupo' => $grupo->id, 'programa' => $programa->id]) }}" class="modal-content">
                                    @csrf @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar Programa</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input type="text" name="nombre" value="{{ $programa->nombre }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Descripción</label>
                                            <textarea name="descripcion" class="form-control">{{ $programa->descripcion }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-vino">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <!-- Formulario Añadir Programa -->
                    <form method="POST" action="{{ route('programas.store', $grupo->id) }}" class="row g-2 mt-4 gestion-section d-none">
                        @csrf
                        <div class="col-md-5">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del programa" required>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="descripcion" class="form-control" placeholder="Descripción (opcional)">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-vino w-100">Añadir</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Editar Grupo -->
            <div class="modal fade" id="editarGrupo{{ $grupo->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('grupos.update', $grupo) }}" class="modal-content">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Grupo</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="nombre" value="{{ $grupo->nombre }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control">{{ $grupo->descripcion }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-vino">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        const gestionBtn = document.getElementById('toggleGestion');
        gestionBtn.addEventListener('click', () => {
            const sections = document.querySelectorAll('.gestion-section');
            const active = !sections[0].classList.contains('d-none');

            sections.forEach(s => s.classList.toggle('d-none'));

            gestionBtn.innerHTML = active 
                ? '<i class="fas fa-lock me-2"></i> Activar modo gestión'
                : '<i class="fas fa-unlock me-2"></i> Modo gestión activo';

            gestionBtn.classList.toggle('btn-outline-gold');
            gestionBtn.classList.toggle('btn-vino');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
