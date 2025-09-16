<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4C1B1B;
            --secondary-color: #FFD700;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
        }
        
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            border: none;
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #600000 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn-approve {
            background-color: var(--success-color);
            color: white;
            border-radius: 8px;
            padding: 0.375rem 0.75rem;
            transition: all 0.3s;
        }
        
        .btn-approve:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }
        
        .btn-reject {
            background-color: var(--danger-color);
            color: white;
            border-radius: 8px;
            padding: 0.375rem 0.75rem;
            transition: all 0.3s;
        }
        
        .btn-reject:hover {
            background-color: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }
        
        .btn-view {
            background-color: var(--info-color);
            color: white;
            border-radius: 8px;
            padding: 0.375rem 0.75rem;
            transition: all 0.3s;
        }
        
        .btn-view:hover {
            background-color: #138496;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
        }
        
        .badge-pendiente {
            background-color: var(--warning-color);
            color: #212529;
            font-weight: 600;
            padding: 0.35em 0.65em;
            border-radius: 50px;
        }
        
        .badge-aprobado {
            background-color: var(--success-color);
            color: white;
            font-weight: 600;
            padding: 0.35em 0.65em;
            border-radius: 50px;
        }
        
        .badge-rechazado {
            background-color: var(--danger-color);
            color: white;
            font-weight: 600;
            padding: 0.35em 0.65em;
            border-radius: 50px;
        }
        
        .table-responsive {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .search-box {
            max-width: 400px;
            margin-bottom: 25px;
        }
        
        .profile-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
            transition: all 0.3s;
        }
        
        .profile-img:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .modal-profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 3px solid var(--primary-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .photo-required {
            position: relative;
        }
        
        .photo-required::after {
            content: "Requerido";
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        .btn-whatsapp {
            background-color: #25D366;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.375rem 0.75rem;
            transition: all 0.3s;
        }
        
        .btn-whatsapp:hover {
            background-color: #128C7E;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(37, 211, 102, 0.3);
        }
        
        .table thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            border-bottom: none;
        }
        
        .table tbody tr {
            transition: all 0.2s;
        }
        
        .table tbody tr:hover {
            background-color: rgba(76, 27, 27, 0.05);
            transform: translateX(2px);
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .empty-state i {
            font-size: 3rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }
        
        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }
        
        .status-pendiente {
            background-color: var(--warning-color);
        }
        
        .status-aprobado {
            background-color: var(--success-color);
        }
        
        .status-rechazado {
            background-color: var(--danger-color);
        }
        
        .alert-success {
            background-color: rgba(40, 167, 69, 0.15);
            border-left: 4px solid var(--success-color);
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.15);
            border-left: 4px solid var(--danger-color);
        }
    </style>
</head>
<body>
   
            
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>{!! nl2br(session('success')) !!}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div>{{ session('error') }}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="search-box">
                    <form action="{{ route('preinscripciones.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar por DNI o nombre..." 
                                   name="search" value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Estudiante</th>
                                <th>DNI</th>
                                <th>Programa</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($preinscripciones as $index => $preinscripcion)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="photo-required">
                                    @if($preinscripcion->foto_perfil)
                                        <img src="{{ asset($preinscripcion->foto_perfil) }}" alt="Foto" class="profile-img">
                                    @else
                                        <div class="profile-img bg-danger text-white d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-triangle"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $preinscripcion->nombres }}</strong><br>
                                    <small class="text-muted">{{ $preinscripcion->apellido_paterno }} {{ $preinscripcion->apellido_materno }}</small>
                                </td>
                                <td>{{ $preinscripcion->dni }}</td>
                                <td>
                                    {{ $preinscripcion->programa_estudios }}<br>
                                    <small class="text-muted">
                                        @if($preinscripcion->ciclo == 'intensivo')
                                            Intensivo
                                        @elseif($preinscripcion->ciclo == 'ordinario_I')
                                            Ordinario I
                                        @else
                                            Ordinario II
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    @if($preinscripcion->estado == 'pendiente')
                                        <span class="status-indicator status-pendiente"></span>
                                        <span class="badge-pendiente">Pendiente</span>
                                    @elseif($preinscripcion->estado == 'aprobado')
                                        <span class="status-indicator status-aprobado"></span>
                                        <span class="badge-aprobado">Aprobado</span>
                                    @else
                                        <span class="status-indicator status-rechazado"></span>
                                        <span class="badge-rechazado">Rechazado</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-view btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{$preinscripcion->id}}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        
                                        @if($preinscripcion->estado == 'pendiente')
                                            <a href="{{ route('preinscripciones.aprobar', $preinscripcion->id) }}" 
                                               class="btn btn-approve btn-sm" 
                                               onclick="return confirm('¿Estás seguro de aprobar esta preinscripción? Se notificará al estudiante por WhatsApp.')">
                                                <i class="bi bi-check"></i>
                                            </a>
                                            <a href="{{ route('preinscripciones.rechazar', $preinscripcion->id) }}" 
                                               class="btn btn-reject btn-sm" 
                                               onclick="return confirm('¿Estás seguro de rechazar esta preinscripción? Se notificará al estudiante por WhatsApp.')">
                                                <i class="bi bi-x"></i>
                                            </a>
                                        @endif
                                        
                                        <a href="https://wa.me/51{{ $preinscripcion->watsap_propio }}" 
                                           class="btn btn-whatsapp btn-sm" 
                                           target="_blank"
                                           data-status="{{ $preinscripcion->estado }}">
                                            <i class="bi bi-whatsapp"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Modal para ver detalles -->
                            <div class="modal fade" id="viewModal{{$preinscripcion->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">
                                                <i class="bi bi-person-lines-fill me-2"></i>
                                                Detalles de Preinscripción #{{ $preinscripcion->id }}
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center mb-4">
                                                @if($preinscripcion->foto_perfil)
                                                    <img src="{{ asset($preinscripcion->foto_perfil) }}" alt="Foto de perfil" class="modal-profile-img">
                                                    <div class="mt-2">
                                                        <a href="{{ asset($preinscripcion->foto_perfil) }}" target="_blank" class="btn btn-sm btn-primary">
                                                            <i class="bi bi-zoom-in"></i> Ampliar Foto
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="modal-profile-img bg-danger text-white d-flex align-items-center justify-content-center mx-auto">
                                                        <i class="bi bi-exclamation-triangle" style="font-size: 3rem;"></i>
                                                    </div>
                                                    <p class="text-danger mt-2">Foto de perfil no disponible</p>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100">
                                                        <div class="card-header bg-light">
                                                            <h6 class="mb-0"><i class="bi bi-person-vcard"></i> Datos Personales</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <p><strong>Nombres:</strong> {{ $preinscripcion->nombres }}</p>
                                                            <p><strong>Apellidos:</strong> {{ $preinscripcion->apellido_paterno }} {{ $preinscripcion->apellido_materno }}</p>
                                                            <p><strong>DNI:</strong> {{ $preinscripcion->dni }}</p>
                                                            <p><strong>Fecha Nacimiento:</strong> {{ date('d/m/Y', strtotime($preinscripcion->fecha_nacimiento)) }} ({{ \Carbon\Carbon::parse($preinscripcion->fecha_nacimiento)->age }} años)</p>
                                                            <p><strong>Sexo:</strong> {{ ucfirst($preinscripcion->sexo) }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100">
                                                        <div class="card-header bg-light">
                                                            <h6 class="mb-0"><i class="bi bi-telephone"></i> Contacto</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <p><strong>WhatsApp:</strong> 51{{ $preinscripcion->watsap_propio }}</p>
                                                            <p><strong>WhatsApp Apoderado:</strong> 51{{ $preinscripcion->watsap_apoderado }}</p>
                                                            <p><strong>Parentesco:</strong> {{ $preinscripcion->parentesco }}</p>
                                                            <p><strong>Ubicación:</strong> {{ $preinscripcion->departamento }} - {{ $preinscripcion->provincia }} - {{ $preinscripcion->distrito }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100">
                                                        <div class="card-header bg-light">
                                                            <h6 class="mb-0"><i class="bi bi-book"></i> Información Académica</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <p><strong>Programa:</strong> {{ $preinscripcion->programa_estudios }}</p>
                                                            <p><strong>Ciclo:</strong> 
                                                                @if($preinscripcion->ciclo == 'intensivo')
                                                                    Intensivo
                                                                @elseif($preinscripcion->ciclo == 'ordinario_I')
                                                                    Ordinario I
                                                                @else
                                                                    Ordinario II
                                                                @endif
                                                            </p>
                                                            <p><strong>Colegio:</strong> {{ $preinscripcion->colegio_procedencia }}</p>
                                                            <p><strong>¿Cómo se enteró?:</strong> 
                                                                @switch($preinscripcion->como_se_entero)
                                                                    @case('amigos_familiares') Amigos/Familiares @break
                                                                    @case('redes_sociales') Redes Sociales @break
                                                                    @case('radio_tv') Radio/TV @break
                                                                    @case('volantes') Volantes @break
                                                                    @case('ferias') Ferias @break
                                                                    @default Otro
                                                                @endswitch
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100">
                                                        <div class="card-header bg-light">
                                                            <h6 class="mb-0"><i class="bi bi-cash-coin"></i> Información de Pago</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <p><strong>N° Recibo:</strong> {{ $preinscripcion->numero_recibo }}</p>
                                                            <p><strong>Fecha Pago:</strong> {{ date('d/m/Y', strtotime($preinscripcion->fecha_pago)) }}</p>
                                                            <p><strong>Monto:</strong> S/ {{ number_format($preinscripcion->monto_pagado, 2) }}</p>
                                                            <p><strong>Estado Pago:</strong> 
                                                                @if($preinscripcion->estado_pago == 'pago_completado')
                                                                    <span class="badge bg-success">Completado</span>
                                                                @else
                                                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="card mb-3">
                                                <div class="card-header bg-light">
                                                    <h6 class="mb-0"><i class="bi bi-info-circle"></i> Estado de la Preinscripción</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            @if($preinscripcion->estado == 'pendiente')
                                                                <span class="badge-pendiente"><i class="bi bi-hourglass"></i> Pendiente de revisión</span>
                                                                <p class="mt-2 mb-0">Esta preinscripción está esperando ser revisada por el área de admisiones.</p>
                                                            @elseif($preinscripcion->estado == 'aprobado')
                                                                <span class="badge-aprobado"><i class="bi bi-check-circle"></i> Aprobada</span>
                                                                <p class="mt-2 mb-0">Esta preinscripción fue aprobada el {{ $preinscripcion->updated_at->format('d/m/Y') }}.</p>
                                                            @else
                                                                <span class="badge-rechazado"><i class="bi bi-x-circle"></i> Rechazada</span>
                                                                <p class="mt-2 mb-0">Esta preinscripción fue rechazada el {{ $preinscripcion->updated_at->format('d/m/Y') }}.</p>
                                                            @endif
                                                        </div>
                                                        <div class="text-end">
                                                            <small class="text-muted">Registrado el: {{ $preinscripcion->created_at->format('d/m/Y H:i') }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            @if($preinscripcion->estado == 'pendiente')
                                                <a href="{{ route('preinscripciones.aprobar', $preinscripcion->id) }}" 
                                                   class="btn btn-success" 
                                                   onclick="return confirm('¿Estás seguro de aprobar esta preinscripción? Se notificará al estudiante por WhatsApp.')">
                                                    <i class="bi bi-check-circle"></i> Aprobar
                                                </a>
                                                <a href="{{ route('preinscripciones.rechazar', $preinscripcion->id) }}" 
                                                   class="btn btn-danger" 
                                                   onclick="return confirm('¿Estás seguro de rechazar esta preinscripción? Se notificará al estudiante por WhatsApp.')">
                                                    <i class="bi bi-x-circle"></i> Rechazar
                                                </a>
                                            @endif
                                            
                                            <a href="https://wa.me/51{{ $preinscripcion->watsap_propio }}" 
                                               class="btn btn-success" 
                                               target="_blank">
                                                <i class="bi bi-whatsapp"></i> Contactar al Estudiante
                                            </a>
                                            
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                <i class="bi bi-x-lg"></i> Cerrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @if($preinscripciones->isEmpty())
                    <div class="empty-state">
                        <i class="bi bi-file-earmark-excel"></i>
                        <h4>No hay preinscripciones registradas</h4>
                        <p class="text-muted">No se encontraron registros con los criterios de búsqueda actuales.</p>
                        
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script para mostrar confirmación al contactar por WhatsApp
        document.querySelectorAll('[data-status="pendiente"]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if(!confirm('Esta preinscripción aún está pendiente. ¿Desea contactar al estudiante de todas formas?')) {
                    e.preventDefault();
                }
            });
        });
        
        // Mostrar tooltips para los botones de acción
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>