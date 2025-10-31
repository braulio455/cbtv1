<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-50: #E6F7FF;
            --primary-100: #D1F2FF;
            --primary-200: #9EE7FF;
            --primary-300: #6BDCFF;
            --primary-400: #38D1FF;
            --primary-500: #05C6FF; /* Azul turquesa principal */
            --primary-600: #04A8D8;
            --primary-700: #038AB0;
            --primary-800: #026C88;
            --primary-900: #014E60;
            
            --accent-100: #FFE8D9;
            --accent-300: #FFC9A8;
            --accent-500: #FF8C42; /* Color acento coral/naranja */
            --accent-700: #E66A1A;
            --accent-900: #B3520F;
            
            --neutral-50: #F8FAFC;
            --neutral-100: #F1F5F9;
            --neutral-200: #E2E8F0;
            --neutral-300: #CBD5E1;
            --neutral-500: #64748B;
            --neutral-700: #334155;
            --neutral-900: #0F172A;
            
            --success: #10B981;
            --warning: #F59E0B;
            --error: #EF4444;
            
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
            --shadow-lg: 0 12px 36px rgba(0,0,0,0.1);
            --transition: 260ms cubic-bezier(.22,.9,.35,1);
        }
        
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, var(--neutral-50) 0%, var(--primary-50) 100%);
            color: var(--neutral-900);
            padding: 0;
            margin: 0;
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .main-container {
            padding: 20px;
            max-width: 100%;
            margin: 0 auto;
        }
        
        .card {
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            margin-bottom: 24px;
            border: none;
            overflow: hidden;
            transition: transform var(--transition), box-shadow var(--transition);
            height: fit-content;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-700) 0%, var(--primary-900) 100%);
            color: white;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0 !important;
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .card-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .card-body {
            padding: 1.5rem;
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }
        
        .btn-approve {
            background-color: var(--success);
            color: white;
            border-radius: var(--radius-sm);
            padding: 0.5rem 1rem;
            transition: all var(--transition);
            border: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-approve:hover {
            background-color: #0DA271;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            color: white;
        }
        
        .btn-reject {
            background-color: var(--error);
            color: white;
            border-radius: var(--radius-sm);
            padding: 0.5rem 1rem;
            transition: all var(--transition);
            border: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-reject:hover {
            background-color: #DC2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
            color: white;
        }
        
        .btn-view {
            background-color: var(--primary-500);
            color: white;
            border-radius: var(--radius-sm);
            padding: 0.5rem 1rem;
            transition: all var(--transition);
            border: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-view:hover {
            background-color: var(--primary-600);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(5, 198, 255, 0.3);
            color: white;
        }
        
        .badge-pendiente {
            background-color: var(--warning);
            color: #212529;
            font-weight: 600;
            padding: 0.35em 0.65em;
            border-radius: 50px;
            font-size: 0.8rem;
        }
        
        .badge-aprobado {
            background-color: var(--success);
            color: white;
            font-weight: 600;
            padding: 0.35em 0.65em;
            border-radius: 50px;
            font-size: 0.8rem;
        }
        
        .badge-rechazado {
            background-color: var(--error);
            color: white;
            font-weight: 600;
            padding: 0.35em 0.65em;
            border-radius: 50px;
            font-size: 0.8rem;
        }
        
        .table-responsive {
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            max-height: 60vh;
            overflow-y: auto;
        }
        
        .search-box {
            max-width: 100%;
            margin-bottom: 25px;
        }
        
        .profile-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid var(--neutral-200);
            transition: all var(--transition);
        }
        
        .profile-img:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .modal-profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: var(--radius-md);
            margin-bottom: 20px;
            border: 3px solid var(--primary-500);
            box-shadow: var(--shadow-md);
        }
        
        .photo-required {
            position: relative;
        }
        
        .photo-required::after {
            content: "Requerido";
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--error);
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
            flex-wrap: wrap;
        }
        
        .btn-whatsapp {
            background-color: #25D366;
            color: white;
            font-weight: 600;
            border-radius: var(--radius-sm);
            padding: 0.5rem 1rem;
            transition: all var(--transition);
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-whatsapp:hover {
            background-color: #128C7E;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
        }
        
        .table thead th {
            background-color: var(--primary-700);
            color: white;
            font-weight: 600;
            border-bottom: none;
            padding: 1rem 0.75rem;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .table tbody tr {
            transition: all 0.2s;
        }
        
        .table tbody tr:hover {
            background-color: rgba(5, 198, 255, 0.05);
        }
        
        .table tbody td {
            padding: 1rem 0.75rem;
            vertical-align: middle;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background-color: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
        }
        
        .empty-state i {
            font-size: 3rem;
            color: var(--neutral-500);
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
            background-color: var(--warning);
        }
        
        .status-aprobado {
            background-color: var(--success);
        }
        
        .status-rechazado {
            background-color: var(--error);
        }
        
        .alert-success {
            background-color: rgba(16, 185, 129, 0.15);
            border-left: 4px solid var(--success);
            border-radius: var(--radius-sm);
        }
        
        .alert-danger {
            background-color: rgba(239, 68, 68, 0.15);
            border-left: 4px solid var(--error);
            border-radius: var(--radius-sm);
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--primary-700) 0%, var(--primary-900) 100%);
            color: white;
            border-bottom: none;
            padding: 1.5rem;
        }
        
        .modal-footer {
            border-top: 1px solid var(--neutral-200);
            padding: 1.5rem;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
        
        .modal-footer .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
        }
        
        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .main-container {
                padding: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .main-container {
                padding: 10px;
            }
            
            .card-header {
                padding: 1rem;
                flex-direction: column;
                align-items: flex-start;
            }
            
            .card-header h2 {
                font-size: 1.25rem;
            }
            
            .card-body {
                padding: 1rem;
                max-height: calc(100vh - 150px);
            }
            
            .table thead {
                display: none;
            }
            
            .table tbody tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid var(--neutral-200);
                border-radius: var(--radius-md);
                padding: 1rem;
                background: white;
                box-shadow: var(--shadow-sm);
            }
            
            .table tbody td {
                display: block;
                text-align: right;
                padding: 0.5rem 0.75rem;
                border-bottom: 1px solid var(--neutral-100);
            }
            
            .table tbody td:before {
                content: attr(data-label);
                float: left;
                font-weight: 600;
                color: var(--primary-700);
            }
            
            .table tbody td:last-child {
                border-bottom: none;
            }
            
            .action-buttons {
                justify-content: flex-end;
            }
            
            .modal-dialog {
                margin: 10px;
            }
            
            .modal-footer .btn {
                flex: 1;
                min-width: 120px;
                justify-content: center;
            }
        }
        
        @media (max-width: 576px) {
            .search-box {
                margin-bottom: 15px;
            }
            
            .empty-state {
                padding: 40px 15px;
            }
            
            .empty-state i {
                font-size: 2.5rem;
            }
            
            .modal-profile-img {
                width: 120px;
                height: 120px;
            }
            
            .action-buttons .btn {
                padding: 0.375rem 0.75rem;
                font-size: 0.875rem;
            }
        }
        
        @media (max-width: 400px) {
            .action-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .action-buttons .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="card">
            <div class="card-header">
                <h2><i class="bi bi-people-fill me-2"></i>Gestión de Preinscripciones</h2>
                <div class="d-flex align-items-center">
                    <span class="badge bg-primary fs-6">{{ $preinscripciones->count() }} registros</span>
                </div>
            </div>
            
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>{!! nl2br(session('success')) !!}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-4">
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
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search me-1"></i> Buscar
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
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
                                <td data-label="#">{{ $index + 1 }}</td>
                                <td data-label="Foto" class="photo-required">
                                    @if($preinscripcion->foto_perfil)
                                        <img src="{{ asset($preinscripcion->foto_perfil) }}" alt="Foto" class="profile-img">
                                    @else
                                        <div class="profile-img bg-danger text-white d-flex align-items-center justify-content-center">
                                            <i class="bi bi-exclamation-triangle"></i>
                                        </div>
                                    @endif
                                </td>
                                <td data-label="Estudiante">
                                    <strong>{{ $preinscripcion->nombres }}</strong><br>
                                    <small class="text-muted">{{ $preinscripcion->apellido_paterno }} {{ $preinscripcion->apellido_materno }}</small>
                                </td>
                                <td data-label="DNI">{{ $preinscripcion->dni }}</td>
                                <td data-label="Programa">
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
                                <td data-label="Estado">
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
                                <td data-label="Acciones">
                                    <div class="action-buttons">
                                        <button class="btn btn-view btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{$preinscripcion->id}}">
                                            <i class="bi bi-eye"></i>
                                            <span class="d-none d-md-inline">Ver</span>
                                        </button>
                                        
                                        @if($preinscripcion->estado == 'pendiente')
                                            <a href="{{ route('preinscripciones.aprobar', $preinscripcion->id) }}" 
                                               class="btn btn-approve btn-sm" 
                                               onclick="return confirm('¿Estás seguro de aprobar esta preinscripción? Se notificará al estudiante por WhatsApp.')">
                                                <i class="bi bi-check"></i>
                                                <span class="d-none d-md-inline">Aprobar</span>
                                            </a>
                                            <a href="{{ route('preinscripciones.rechazar', $preinscripcion->id) }}" 
                                               class="btn btn-reject btn-sm" 
                                               onclick="return confirm('¿Estás seguro de rechazar esta preinscripción? Se notificará al estudiante por WhatsApp.')">
                                                <i class="bi bi-x"></i>
                                                <span class="d-none d-md-inline">Rechazar</span>
                                            </a>
                                        @endif
                                        
                                        <a href="https://wa.me/51{{ $preinscripcion->watsap_propio }}" 
                                           class="btn btn-whatsapp btn-sm" 
                                           target="_blank"
                                           data-status="{{ $preinscripcion->estado }}">
                                            <i class="bi bi-whatsapp"></i>
                                            <span class="d-none d-md-inline">WhatsApp</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @if($preinscripciones->isEmpty())
                    <div class="empty-state mt-4">
                        <i class="bi bi-file-earmark-excel"></i>
                        <h4>No hay preinscripciones registradas</h4>
                        <p class="text-muted">No se encontraron registros con los criterios de búsqueda actuales.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modales -->
    @foreach($preinscripciones as $preinscripcion)
    <div class="modal fade" id="viewModal{{$preinscripcion->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
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
        
        // Convertir tabla a responsive en dispositivos móviles
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth <= 768) {
                const headers = [];
                document.querySelectorAll('thead th').forEach((th, index) => {
                    headers[index] = th.textContent;
                });
                
                document.querySelectorAll('tbody td').forEach((td, index) => {
                    const headerIndex = index % headers.length;
                    td.setAttribute('data-label', headers[headerIndex]);
                });
            }
            
            // Prevenir parpadeo en hover
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.style.willChange = 'transform';
            });
        });
        
        // Mostrar tooltips para los botones de acción
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
