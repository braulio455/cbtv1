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
            --color-naranja: #FF8C42;
            --color-naranja-oscuro: #E6732E;
            --color-naranja-claro: #FFE8D6;
            --color-turquesa: #40E0D0;
            --color-turquesa-oscuro: #30C5B7;
            --color-turquesa-suave: #E0F7FA;
            --color-gris-claro: #f9f9f9;
            --color-texto: #2f2f2f;
            --radius: 0; /* ESQUINAS RECTAS */
            --shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        body {
            background: linear-gradient(135deg, var(--color-turquesa-suave), #ffffff);
            color: var(--color-texto);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            padding: 1.5rem;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
        }

        .header, .card-header, .modal-header {
            background: linear-gradient(135deg, var(--color-turquesa), var(--color-turquesa-oscuro));
            color: white;
            padding: 1rem 1.5rem;
            border-bottom: 2px solid var(--color-naranja);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid #e0e0e0;
            margin-bottom: 1.5rem;
            transition: box-shadow 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-naranja {
            background: var(--color-naranja);
            color: white;
            font-weight: 600;
            border-radius: var(--radius);
            padding: 0.6rem 1.2rem;
            border: none;
            transition: background-color 0.2s ease;
        }

        .btn-naranja:hover {
            background: var(--color-naranja-oscuro);
            color: white;
        }

        .btn-outline-turquesa {
            border: 1px solid var(--color-turquesa);
            color: var(--color-turquesa);
            font-weight: 600;
            border-radius: var(--radius);
            padding: 0.6rem 1.2rem;
            transition: all 0.2s ease;
        }

        .btn-outline-turquesa:hover {
            background: var(--color-turquesa);
            color: white;
        }

        .form-label {
            font-weight: 600;
            color: var(--color-turquesa-oscuro);
        }

        .form-control, .form-select {
            border: 1px solid #ced4da;
            border-radius: var(--radius);
            padding: 0.6rem 0.8rem;
            transition: border-color 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--color-naranja);
            box-shadow: 0 0 0 0.2rem rgba(255, 140, 66, 0.25);
        }

        .alert {
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border-left: 3px solid var(--color-turquesa);
        }

        .modal-content {
            border-radius: var(--radius);
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .dropdown-menu {
            border-radius: var(--radius);
            border: 1px solid var(--color-turquesa);
            box-shadow: var(--shadow);
        }

        .gestion-section {
            transition: opacity 0.3s ease;
        }

        .gestion-section.d-none {
            display: none !important;
        }

        .programa-item {
            border-left: 3px solid var(--color-naranja);
            background: #fffaf5;
            padding: 0.8rem 1rem;
            border-radius: var(--radius);
            margin-bottom: 0.8rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .text-naranja {
            color: var(--color-naranja) !important;
        }

        .text-turquesa {
            color: var(--color-turquesa) !important;
        }

        .badge-turquesa {
            background: var(--color-turquesa);
            color: white;
            border-radius: var(--radius);
            padding: 0.3rem 0.6rem;
            font-weight: 600;
            font-size: 0.75rem;
        }

        /* Animaciones mejoradas */
        .fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .slide-down {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Mejoras para evitar parpadeo */
        .gestion-content {
            opacity: 1;
            transition: opacity 0.2s ease;
        }

        .gestion-content.hidden {
            opacity: 0;
            height: 0;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 fade-in">
            <h1 class="text-turquesa fw-bold">
                <i class="fas fa-layer-group me-2"></i>Gestión de Grupos y Programas
            </h1>
            <button id="toggleGestion" class="btn btn-outline-turquesa">
                <i class="fas fa-lock me-2"></i> Activar modo gestión
            </button>
        </div>

        <!-- Alertas -->
        <div class="alert-container">
            @foreach (['success', 'info', 'danger'] as $msg)
                @if(session($msg))
                    <div class="alert alert-{{ $msg }} alert-dismissible fade show slide-down mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas 
                                @if($msg == 'success') fa-check-circle 
                                @elseif($msg == 'info') fa-info-circle 
                                @else fa-exclamation-triangle 
                                @endif me-2"></i>
                            <span class="flex-grow-1">{{ session($msg) }}</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            @endforeach

            @if ($errors->any())
                <div class="alert alert-danger slide-down mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <h6 class="mb-0">Por favor corrige los siguientes errores:</h6>
                    </div>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Botón Nuevo Grupo -->
        <div class="text-end mb-3 gestion-section d-none">
            <button class="btn btn-naranja" data-bs-toggle="modal" data-bs-target="#modalNuevoGrupo">
                <i class="fas fa-plus-circle me-2"></i> Nuevo Grupo
            </button>
        </div>

        <!-- Modal Crear Grupo -->
        <div class="modal fade" id="modalNuevoGrupo" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('grupos.store') }}" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-folder-plus me-2"></i>Crear Grupo
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre del Grupo</label>
                            <input type="text" name="nombre" class="form-control" required placeholder="Ingresa el nombre del grupo">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripción opcional del grupo"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-turquesa" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-naranja">
                            <i class="fas fa-save me-2"></i>Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Lista de Grupos -->
        <div class="grupos-container">
            @foreach ($grupos as $grupo)
                <div class="card fade-in">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-folder me-2 text-naranja"></i>
                            <div>
                                <h5 class="mb-1">{{ $grupo->nombre }}</h5>
                                @if($grupo->programas->count() > 0)
                                    <span class="badge-turquesa">
                                        {{ $grupo->programas->count() }} programa(s)
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="dropdown gestion-section d-none">
                            <button class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
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
                        @if($grupo->descripcion)
                            <p class="text-muted mb-3">{{ $grupo->descripcion }}</p>
                        @endif

                        <!-- Lista de Programas -->
                        <div class="programas-container">
                            @foreach ($grupo->programas as $programa)
                                <div class="programa-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="text-turquesa mb-1">{{ $programa->nombre }}</h6>
                                            @if($programa->descripcion)
                                                <p class="text-muted mb-0 small">{{ $programa->descripcion }}</p>
                                            @endif
                                        </div>
                                        <div class="gestion-section d-none">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-outline-turquesa me-1" data-bs-toggle="modal" data-bs-target="#editarPrograma{{ $programa->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('programas.destroy', ['grupo' => $grupo->id, 'programa' => $programa->id]) }}">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Editar Programa -->
                                <div class="modal fade" id="editarPrograma{{ $programa->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form method="POST" action="{{ route('programas.update', ['grupo' => $grupo->id, 'programa' => $programa->id]) }}" class="modal-content">
                                            @csrf @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Programa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nombre</label>
                                                    <input type="text" name="nombre" value="{{ $programa->nombre }}" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Descripción</label>
                                                    <textarea name="descripcion" class="form-control" rows="3">{{ $programa->descripcion }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-turquesa" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-naranja">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Formulario Añadir Programa -->
                        <form method="POST" action="{{ route('programas.store', $grupo->id) }}" class="row g-2 mt-3 gestion-section d-none">
                            @csrf
                            <div class="col-md-5">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre del programa" required>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="descripcion" class="form-control" placeholder="Descripción (opcional)">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-naranja w-100">
                                    <i class="fas fa-plus"></i>
                                </button>
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="nombre" value="{{ $grupo->nombre }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Descripción</label>
                                    <textarea name="descripcion" class="form-control" rows="3">{{ $grupo->descripcion }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-turquesa" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-naranja">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Estado vacío -->
        @if($grupos->count() == 0)
            <div class="card text-center py-4">
                <div class="card-body">
                    <i class="fas fa-folder-open fa-3x text-turquesa mb-3"></i>
                    <h4 class="text-naranja mb-2">No hay grupos creados</h4>
                    <p class="text-muted mb-3">Comienza creando tu primer grupo para organizar tus programas</p>
                    <button class="btn btn-naranja gestion-section d-none" data-bs-toggle="modal" data-bs-target="#modalNuevoGrupo">
                        <i class="fas fa-plus-circle me-2"></i> Crear primer grupo
                    </button>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gestionBtn = document.getElementById('toggleGestion');
            let gestionActivo = false;
            
            // Configurar modales de Bootstrap
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                modal.addEventListener('show.bs.modal', function () {
                    // Asegurar que el modal se muestre correctamente
                    document.body.classList.add('modal-open');
                });
                
                modal.addEventListener('hidden.bs.modal', function () {
                    // Limpiar cuando se cierra el modal
                    document.body.classList.remove('modal-open');
                });
            });
            
            // Toggle del modo gestión
            gestionBtn.addEventListener('click', function() {
                gestionActivo = !gestionActivo;
                toggleGestionMode(gestionActivo);
                updateToggleButton(gestionActivo);
            });
            
            function toggleGestionMode(activo) {
                const sections = document.querySelectorAll('.gestion-section');
                
                if (activo) {
                    // Mostrar elementos con animación
                    sections.forEach(section => {
                        section.classList.remove('d-none');
                        section.style.opacity = '0';
                        section.style.transition = 'opacity 0.3s ease';
                        
                        // Usar requestAnimationFrame para asegurar la transición
                        requestAnimationFrame(() => {
                            section.style.opacity = '1';
                        });
                    });
                } else {
                    // Ocultar elementos con animación
                    sections.forEach(section => {
                        section.style.opacity = '0';
                        
                        // Esperar a que termine la transición para ocultar
                        setTimeout(() => {
                            section.classList.add('d-none');
                        }, 300);
                    });
                }
            }
            
            function updateToggleButton(activo) {
                if (activo) {
                    gestionBtn.innerHTML = '<i class="fas fa-unlock me-2"></i> Modo gestión activo';
                    gestionBtn.classList.remove('btn-outline-turquesa');
                    gestionBtn.classList.add('btn-naranja');
                } else {
                    gestionBtn.innerHTML = '<i class="fas fa-lock me-2"></i> Activar modo gestión';
                    gestionBtn.classList.remove('btn-naranja');
                    gestionBtn.classList.add('btn-outline-turquesa');
                }
            }
            
            // Prevenir envíos duplicados de formularios
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitBtn = this.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Procesando...';
                        
                        // Re-enable after 5 seconds in case of error
                        setTimeout(() => {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = submitBtn.getAttribute('data-original-text') || 'Enviar';
                        }, 5000);
                    }
                });
            });
        });
    </script>
</body>
</html>