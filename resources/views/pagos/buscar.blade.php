<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pagos | CBT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-vino: #6a0f1a;
            --color-vino-claro: #8c1d2b;
            --color-dorado: #d4af37;
            --color-dorado-claro: #f8e8c8;
            --color-gris: #f5f5f5;
            --color-texto: #333;
        }
        
        body {
            background-color: var(--color-gris);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--color-texto);
        }
        
        .header-bg {
            background: linear-gradient(135deg, var(--color-vino), var(--color-vino-claro));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-bottom: 5px solid var(--color-dorado);
        }
        
        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .card-header-custom {
            background: linear-gradient(to right, var(--color-vino), var(--color-vino-claro));
            color: white;
            padding: 1.25rem;
            border-bottom: 2px solid var(--color-dorado);
        }
        
        .btn-vino {
            background-color: var(--color-vino);
            border-color: var(--color-vino);
            color: white;
        }
        
        .btn-vino:hover {
            background-color: var(--color-vino-claro);
            border-color: var(--color-vino-claro);
            color: white;
        }
        
        .btn-dorado {
            background-color: var(--color-dorado);
            border-color: var(--color-dorado);
            color: #000;
        }
        
        .btn-dorado:hover {
            background-color: var(--color-dorado-claro);
            border-color: var(--color-dorado-claro);
        }
        
        .img-perfil {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid var(--color-dorado);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }
        
        .img-perfil-small {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border: 2px solid var(--color-dorado);
        }
        
        .badge-pendiente {
            background-color: var(--color-dorado);
            color: #000;
        }
        
        .badge-completado {
            background-color: var(--color-vino);
            color: white;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--color-dorado);
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        }
        
        .table-custom th {
            background-color: var(--color-vino);
            color: white;
        }
        
        .table-custom tbody tr:hover {
            background-color: rgba(212, 175, 55, 0.1);
        }
        
        .alert-custom {
            border-left: 4px solid var(--color-dorado);
        }
        
        .file-upload {
            border: 2px dashed var(--color-dorado);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-upload:hover {
            background-color: rgba(212, 175, 55, 0.05);
        }
    </style>
</head>
<body>
   
    

    <div class="container">
        <!-- Mensajes -->
        @if(session('success'))
        <div class="alert alert-success alert-custom alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-custom alert-dismissible fade show">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('info'))
        <div class="alert alert-info alert-custom alert-dismissible fade show">
            <i class="fas fa-info-circle me-2"></i>
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Vista de Búsqueda -->
        @if(!isset($resultados) && !isset($inscripcion))
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <h4 class="mb-0"><i class="fas fa-search me-2"></i> Buscar Pagos Pendientes</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pagos.buscar') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-4">
                                <label for="dni" class="form-label">DNI del Postulante</label>
                                <input type="text" class="form-control" id="dni" name="dni" 
                                       required pattern="[0-9]{8}" maxlength="8"
                                       placeholder="Ingrese 8 dígitos">
                                <div class="invalid-feedback">Ingrese un DNI válido (8 dígitos)</div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="ciclo" class="form-label">Ciclo de Inscripción</label>
                                <select class="form-select" id="ciclo" name="ciclo" required>
                                    <option value="">Seleccione un ciclo</option>
                                    <option value="intensivo">Intensivo</option>
                                    <option value="ordinario_I">Ordinario I</option>
                                    <option value="ordinario_II">Ordinario II</option>
                                </select>
                                <div class="invalid-feedback">Seleccione un ciclo</div>
                            </div>
                            
                            <button type="submit" class="btn btn-dorado w-100 py-2">
                                <i class="fas fa-search me-2"></i> Buscar Inscripciones
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Vista de Resultados -->
        @if(isset($resultados))
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <h4 class="mb-0"><i class="fas fa-list me-2"></i> Resultados de Búsqueda</h4>
                    </div>
                    <div class="card-body">
                        @if($resultados->isEmpty())
                        <div class="alert alert-warning text-center">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            No se encontraron registros con pago pendiente para el DNI {{ $search_dni }} y ciclo seleccionado
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-custom table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Apellidos y Nombres</th>
                                        <th>DNI</th>
                                        <th>Ciclo</th>
                                        <th>Programa</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($resultados as $insc)
                                    <tr>
                                        <td>
                                            @if($insc->foto_perfil)
                                            <img src="{{ asset('storage/fotos_perfil/'.$insc->foto_perfil) }}" 
                                                 class="img-perfil-small rounded-circle">
                                            @else
                                            <div class="img-perfil-small rounded-circle bg-secondary d-flex align-items-center justify-content-center">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $insc->apellido_paterno }} {{ $insc->apellido_materno }}</strong><br>
                                            {{ $insc->nombres }}
                                        </td>
                                        <td>{{ $insc->dni }}</td>
                                        <td>
                                            @if($insc->ciclo == 'intensivo')
                                            Intensivo
                                            @elseif($insc->ciclo == 'ordinario_I')
                                            Ordinario I
                                            @else
                                            Ordinario II
                                            @endif
                                        </td>
                                        <td>{{ $insc->programa_estudios }}</td>
                                        <td>
                                            <span class="badge badge-pendiente rounded-pill">
                                                <i class="fas fa-clock me-1"></i> Pendiente
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('pagos.editar', $insc->id) }}" 
                                               class="btn btn-vino btn-sm">
                                                <i class="fas fa-check-circle me-1"></i> Completar
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                        
                        <div class="mt-4 text-center">
                            <a href="{{ route('pagos.form') }}" class="btn btn-dorado">
                                <i class="fas fa-arrow-left me-2"></i> Nueva Búsqueda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Vista de Edición -->
        @if(isset($inscripcion))
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <h4 class="mb-0"><i class="fas fa-check-circle me-2"></i> Completar Pago Pendiente</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pagos.actualizar', $inscripcion->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            
                            <div class="text-center mb-4">
                                @if($inscripcion->foto_perfil)
                                <img src="{{ asset('storage/fotos_perfil/'.$inscripcion->foto_perfil) }}" 
                                     class="img-perfil rounded-circle mb-3" id="currentPhoto">
                                @else
                                <div class="img-perfil rounded-circle bg-secondary d-flex align-items-center justify-content-center mx-auto mb-3">
                                    <i class="fas fa-user text-white fa-3x"></i>
                                </div>
                                @endif
                                
                                <h4>{{ $inscripcion->apellido_paterno }} {{ $inscripcion->apellido_materno }}</h4>
                                <h5>{{ $inscripcion->nombres }}</h5>
                                <p class="text-muted">DNI: {{ $inscripcion->dni }}</p>
                                <span class="badge badge-pendiente rounded-pill px-3 py-2">
                                    <i class="fas fa-clock me-1"></i> Pago Pendiente
                                </span>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Nueva Foto de Perfil</label>
                                <div class="file-upload" onclick="document.getElementById('fotoInput').click()">
                                    <i class="fas fa-cloud-upload-alt fa-3x mb-3" style="color: var(--color-vino);"></i>
                                    <p>Haz clic para subir una nueva foto</p>
                                    <small class="text-muted">Formatos: JPG, PNG (Máx. 2MB)</small>
                                    <input type="file" id="fotoInput" name="foto_perfil" class="d-none" required>
                                </div>
                                <div id="fileFeedback" class="text-center mt-2"></div>
                                @error('foto_perfil')
                                <div class="invalid-feedback d-block text-center">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="alert alert-warning text-center">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Al confirmar, el estado cambiará a <strong>Pago Completado</strong> y no podrá modificarse nuevamente.
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('pagos.form') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-vino">
                                    <i class="fas fa-check-circle me-2"></i> Confirmar Pago
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validación del DNI
        document.getElementById('dni')?.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 8) {
                this.value = this.value.slice(0, 8);
            }
        });

        // Validación de formularios
        const forms = document.querySelectorAll('.needs-validation');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });

        // Vista previa de imagen
        document.getElementById('fotoInput')?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const feedback = document.getElementById('fileFeedback');
            
            if (!file) return;

            // Validaciones
            if (file.size > 2 * 1024 * 1024) {
                feedback.innerHTML = '<div class="text-danger">El archivo excede 2MB</div>';
                this.value = '';
                return;
            }

            if (!file.type.match('image.*')) {
                feedback.innerHTML = '<div class="text-danger">Solo imágenes (JPG/PNG)</div>';
                this.value = '';
                return;
            }

            feedback.innerHTML = `<div class="text-success">${file.name} (${(file.size/1024).toFixed(1)}KB)</div>`;
            
            // Mostrar vista previa
            const reader = new FileReader();
            reader.onload = function(event) {
                const img = document.getElementById('currentPhoto');
                if (img) {
                    img.src = event.target.result;
                } else {
                    const container = document.querySelector('.text-center');
                    const newImg = document.createElement('img');
                    newImg.src = event.target.result;
                    newImg.className = 'img-perfil rounded-circle mb-3';
                    newImg.id = 'currentPhoto';
                    container.insertBefore(newImg, container.firstChild);
                }
            };
            reader.readAsDataURL(file);
        });
    </script>
</body>
</html>