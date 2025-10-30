<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Preinscripciones · CBT</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Preload important assets -->
  <link rel="preload" href="{{ asset('imagenes/1749717676_buho.jpg') }}" as="image">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* ========================
       Palette (sidebar blue + complements)
       ======================== */
    :root{
      --sidebar-blue: #004aad;         /* main sidebar color */
      --primary-400: #3b86ff;          /* brighter blue for accents */
      --primary-100: #eaf4ff;          /* light blue background */
      --muted: #6b7b86;                /* neutral text */
      --success: #21b97a;
      --danger: #e05b61;
      --accent: #f1c66a;               /* subtle gold accent */
      --card-radius: 12px;
      --shadow-lg: 0 14px 40px rgba(8,24,48,0.06);
      --focus-ring: 3px solid rgba(59,134,255,0.18);
      --glass: rgba(255,255,255,0.6);
    }

    /* ========================
       Base + reset
       ======================== */
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, Arial;
      background: linear-gradient(180deg, var(--primary-100), #f8fbff);
      color:#0b2435;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      padding: 1rem;
      -webkit-tap-highlight-color: transparent;
    }

    /* ========================
       Layout: Sidebar / Header / Main
       ======================== */
    nav.sidebar {
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: 260px;
      padding: 1.1rem;
      background: linear-gradient(180deg, var(--sidebar-blue), #0b3a82);
      color: #fff;
      display:flex;
      flex-direction:column;
      gap: .6rem;
      border-radius: 12px;
      box-shadow: var(--shadow-lg);
      z-index: 1300;
      overflow:auto;
    }

    .brand { display:flex; align-items:center; gap:.75rem; padding-bottom:.6rem; border-bottom:1px solid rgba(255,255,255,0.06) }
    .brand .logo-img { width:44px; height:44px; border-radius:8px; overflow:hidden; background:rgba(255,255,255,0.06); display:flex; align-items:center; justify-content:center }
    .brand h1 { margin:0; font-family:'Quicksand', sans-serif; font-size:1.05rem; font-weight:700; letter-spacing:.2px }
    .brand small { opacity:.9; font-size:.78rem; display:block; margin-top:-2px }

    .nav-list { margin-top:.8rem; display:flex; flex-direction:column; gap:.18rem }
    .nav-item {
      display:flex; align-items:center; gap:.75rem; padding:.64rem .9rem; border-radius:10px; text-decoration:none;
      color:rgba(255,255,255,0.95); font-weight:600; transition: all .18s ease; position:relative;
    }
    .nav-item i { min-width:1.15rem; text-align:center; font-size:1.05rem; color:rgba(255,255,255,0.95) }
    .nav-item:hover { transform: translateX(6px); background: rgba(255,255,255,0.06); color: var(--accent) }
    .nav-item.active { background: rgba(255,255,255,0.08); color: var(--accent) }
    .nav-item.active::before { content:""; position:absolute; left:-8px; top:0; height:100%; width:5px; background: linear-gradient(180deg,var(--accent), #ffd166); border-radius:0 6px 6px 0 }

    .sidebar-footer { margin-top:auto; font-size:.82rem; color: rgba(255,255,255,0.88); display:flex; justify-content:space-between; gap:.5rem; padding-top:.6rem; border-top:1px solid rgba(255,255,255,0.04) }

    /* Toggle button (mobile) */
    #toggleSidebar {
      position: fixed; left: 16px; top: 14px; width:48px; height:48px; border-radius:12px; border:0;
      background:#fff; color:var(--sidebar-blue); display:none; align-items:center; justify-content:center;
      z-index: 1350; box-shadow: var(--shadow-lg); cursor:pointer;
    }

    /* Header */
    header.header {
      position: fixed; left:260px; right:0; top: 12px; height:64px; padding: .6rem 1rem; z-index: 1250;
      transition: left .24s ease, right .24s ease; display:flex; align-items:center; gap:1rem;
    }
    .topbar {
      width:100%; display:flex; gap:1rem; align-items:center; padding:.5rem; background: rgba(255,255,255,0.92);
      border-radius: 10px; box-shadow: 0 6px 20px rgba(8,24,48,0.04);
    }
    .welcome { display:flex; gap:.75rem; align-items:center; min-width:0 }
    .welcome h4 { margin:0; font-size:1rem; font-weight:700; white-space:nowrap; overflow:hidden; text-overflow:ellipsis }
    .welcome small { display:block; font-size:.82rem; color:var(--muted) }

    .user-actions { margin-left:auto; display:flex; gap:.6rem; align-items:center }
    .avatar { width:42px; height:42px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; 
      background: linear-gradient(135deg, var(--primary-400), var(--sidebar-blue)); color:#fff; font-weight:700; box-shadow:0 10px 24px rgba(59,134,255,0.08) }

    .btn-logout { border-radius:999px; padding:.44rem .7rem; border:1px solid rgba(16,34,52,0.06); background:#fff; cursor:pointer; font-weight:700 }
    .btn-logout:hover { background: var(--primary-400); color:#fff; border-color: var(--primary-400) }

    /* Main area */
    main.main {
      position: fixed; left:260px; right:12px; top:88px; bottom:12px; padding: 12px; overflow:auto; transition:left .24s ease, right .24s ease;
    }
    .content-shell { width:100%; height:100%; border-radius:12px; background: linear-gradient(180deg,#fff,#fbfeff); box-shadow:var(--shadow-lg); overflow:hidden; position:relative; padding:12px; }

    /* Card */
    .card.custom {
      border-radius: 12px; border:0; box-shadow: 0 10px 30px rgba(8,24,48,0.04); overflow:hidden; background:transparent;
    }
    .card-header {
      background: linear-gradient(90deg, var(--primary-400), var(--sidebar-blue));
      color:#fff; display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:.9rem 1rem; border-radius:8px;
      box-shadow: 0 6px 18px rgba(11,36,56,0.06);
    }

    /* Table & elements */
    .table-responsive { border-radius:10px; overflow:hidden; box-shadow: 0 6px 18px rgba(8,24,48,0.03) }
    .table thead th { background: linear-gradient(90deg, rgba(59,134,255,0.95), rgba(30,86,199,0.95)); color:#fff; font-weight:700; border-bottom:0; }
    .table tbody tr { transition: all .14s ease }
    .table tbody tr:hover { transform: translateX(3px); background: rgba(59,134,255,0.03) }

    .profile-img { width:52px; height:52px; object-fit:cover; border-radius:50%; border:2px solid rgba(11,36,56,0.04); transition: transform .18s ease, box-shadow .18s ease; }
    .profile-img:hover { transform: scale(1.06); box-shadow: 0 10px 30px rgba(59,134,255,0.12); }

    .badge-pendiente { background: rgba(241,198,106,0.12); color:#7a5a22; font-weight:700; padding:.35rem .65rem; border-radius:999px; display:inline-flex; align-items:center; gap:.45rem }
    .badge-aprobado { background: rgba(33,185,122,0.12); color:var(--success); font-weight:700; padding:.35rem .65rem; border-radius:999px; display:inline-flex; align-items:center; gap:.45rem }
    .badge-rechazado { background: rgba(224,91,97,0.12); color:var(--danger); font-weight:700; padding:.35rem .65rem; border-radius:999px; display:inline-flex; align-items:center; gap:.45rem }

    .btn-approve { background: var(--success); color:#fff; border-radius:10px; padding:.36rem .66rem; border:0; }
    .btn-reject { background: var(--danger); color:#fff; border-radius:10px; padding:.36rem .66rem; border:0; }
    .btn-view { background: linear-gradient(90deg,var(--primary-400),var(--sidebar-blue)); color:#fff; border-radius:10px; padding:.34rem .6rem; border:0; }
    .btn-whatsapp { background: #25D366; color:#fff; border-radius:10px; padding:.34rem .6rem; border:0; }

    .action-buttons { display:flex; gap:.45rem; align-items:center; }

    /* Modal */
    .modal-header.bg-primary { background: linear-gradient(90deg,var(--primary-400),var(--sidebar-blue)); color:#fff; }
    .modal-profile-img { width:150px; height:150px; object-fit:cover; border-radius:12px; border:3px solid rgba(59,134,255,0.12) }

    /* Empty state */
    .empty-state { padding: 2rem; text-align:center; background:#fff; border-radius:10px; box-shadow: 0 8px 20px rgba(8,24,48,0.04) }

    /* Focus & accessibility */
    a:focus, button:focus, input:focus { outline:none; box-shadow: var(--focus-ring); border-radius:8px }
    .visually-hidden-focus { position: absolute; left:-10000px; top:auto; width:1px; height:1px; overflow:hidden; }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
      nav.sidebar { transform: translateX(-110%); position: fixed; left: 12px; top:12px; border-radius: 14px; }
      nav.sidebar.show { transform: translateX(0) }
      #toggleSidebar { display:flex; }
      header.header { left: 12px; right: 12px; top: 72px; }
      main.main { left:12px; right:12px; top:144px; bottom:12px; padding:8px; }
    }

    @media (max-width: 768px) {
      .profile-img { width:44px; height:44px }
      .modal-profile-img { width:120px; height:120px }
      .card-header { padding:.6rem; flex-direction:column; align-items:flex-start; gap:.5rem; }
      .btn-logout { padding:.35rem .5rem; font-size:.9rem; }
    }

    @media (max-width: 420px) {
      body { padding:.6rem }
      .brand h1 { font-size:1rem }
      .nav-item span { display:inline-block; }
    }
  </style>
</head>
<body>
  <!-- screen overlay -->
  <div id="screenOverlay" class="screen-overlay" style="display:none;position:fixed;inset:0;background:rgba(2,6,23,0.46);z-index:1280"></div>

  <!-- Mobile toggle -->
  <button id="toggleSidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Abrir menú">
    <i class="bi bi-list" aria-hidden="true" style="font-size:1.2rem"></i>
  </button>

  <!-- Sidebar -->
  <nav id="sidebar" class="sidebar" role="navigation" aria-label="Menú principal">
    <div class="brand" aria-hidden="false">
      <div class="logo-img" aria-hidden="true">
        <img src="{{ asset('imagenes/1749717676_buho.jpg') }}" alt="CBT" style="width:100%;height:100%;object-fit:cover">
      </div>
      <div>
        <h1>CBT</h1>
        <small>Educación</small>
      </div>
    </div>

    <div class="nav-list" role="menu" aria-label="Navegación principal">
      <a class="nav-item active" data-url="/inicio" href="{{ url('/inicio') }}" role="menuitem"><i class="bi bi-house"></i><span>Inicio</span></a>
      <a class="nav-item" data-url="/preinscripciones" href="{{ url('/preinscripciones') }}" role="menuitem"><i class="bi bi-file-earmark-text"></i><span>Preinscripciones</span></a>
      <a class="nav-item" data-url="/grupos" href="{{ url('/grupos') }}" role="menuitem"><i class="bi bi-people"></i><span>Grupos</span></a>
      <a class="nav-item" data-url="/inscripciones/create" href="{{ route('inscripciones.create') }}" role="menuitem"><i class="bi bi-person-plus"></i><span>Inscripciones</span></a>
      <a class="nav-item" data-url="/asignaturas" href="{{ url('/asignaturas') }}" role="menuitem"><i class="bi bi-book"></i><span>Asignaturas</span></a>
      <a class="nav-item" data-url="/docentes" href="{{ url('/docentes') }}" role="menuitem"><i class="bi bi-person-workspace"></i><span>Docentes</span></a>
      <a class="nav-item" data-url="/reportes" href="{{ url('/reportes') }}" role="menuitem"><i class="bi bi-bar-chart"></i><span>Reportes</span></a>
      <a class="nav-item" data-url="/asistencias" href="{{ route('asistencias.index') }}" role="menuitem"><i class="bi bi-calendar-check"></i><span>Asistencias</span></a>
      <a class="nav-item" data-url="/pagos/buscar" href="{{ url('/pagos/buscar') }}" role="menuitem"><i class="bi bi-cash-stack"></i><span>Pagos</span></a>
    </div>

    <div class="sidebar-footer">
      <div>v1.0</div>
      <div>Soporte CBT</div>
    </div>
  </nav>

  <!-- Header -->
  <header class="header" role="banner" aria-label="Barra superior">
    <div class="topbar" role="region" aria-label="Barra de usuario">
      <div class="welcome">
        <div>
          <h4 title="Bienvenido">Bienvenido, <strong style="color:var(--sidebar-blue)">{{ $nombre_completo ?? 'Usuario' }}</strong></h4>
          <small class="text-muted">{{ $rol ?? 'Administrador' }}</small>
        </div>
      </div>

      <div class="user-actions" role="group" aria-label="Acciones de usuario">
        <div class="avatar" title="{{ $nombre_completo ?? 'Usuario' }}">{{ strtoupper(substr($nombre_completo ?? 'U',0,1)) }}</div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
        <button id="btnLogout" class="btn-logout" aria-label="Cerrar sesión">
          <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
          <span>Salir</span>
        </button>
      </div>
    </div>
  </header>

  <!-- Main -->
  <main class="main" id="main" role="main">
    <div class="content-shell" id="contentShell" aria-live="polite">
      <div class="container-fluid h-100">
        <div class="row gy-3">
          <div class="col-12">
            <div class="card custom">
              <div class="card-header">
                <div class="d-flex align-items-center gap-3">
                  <h5 class="mb-0"><i class="bi bi-list-check me-2"></i> Preinscripciones</h5>
                  <small class="text-white-50">Gestión y revisiones</small>
                </div>

                <div class="d-flex align-items-center gap-2">
                  <form class="search-box d-flex" action="{{ route('preinscripciones.index') }}" method="GET" aria-label="Buscar preinscripciones">
                    <div class="input-group">
                      <input type="text" class="form-control" name="search" placeholder="Buscar por DNI o nombre..." value="{{ request('search') }}" aria-label="Buscar">
                      <button class="btn btn-light" type="submit" aria-label="Buscar">
                        <i class="bi bi-search"></i>
                      </button>
                    </div>
                  </form>

                  <a href="{{ route('preinscripciones.create') }}" class="btn btn-outline-light d-none d-md-inline-flex align-items-center" title="Nueva preinscripción">
                    <i class="bi bi-plus-lg me-1"></i> Nuevo
                  </a>
                </div>
              </div>

              <div class="card-body p-0">
                <div class="p-3">
                  @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                      <i class="bi bi-check-circle-fill me-2"></i>
                      <div>{!! nl2br(session('success')) !!}</div>
                    </div>
                  @endif
                  @if(session('error'))
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <i class="bi bi-exclamation-triangle-fill me-2"></i>
                      <div>{{ session('error') }}</div>
                    </div>
                  @endif
                </div>

                <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0">
                    <thead>
                      <tr>
                        <th style="width:48px">#</th>
                        <th style="width:72px">Foto</th>
                        <th>Estudiante</th>
                        <th>DNI</th>
                        <th>Programa</th>
                        <th style="width:170px">Estado</th>
                        <th style="width:160px">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($preinscripciones as $index => $preinscripcion)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>
                            @if($preinscripcion->foto_perfil)
                              <img loading="lazy" src="{{ asset($preinscripcion->foto_perfil) }}" alt="Foto {{ $preinscripcion->nombres }}" class="profile-img">
                            @else
                              <div class="profile-img bg-secondary d-flex align-items-center justify-content-center text-white">
                                <i class="bi bi-camera-fill"></i>
                              </div>
                            @endif
                          </td>
                          <td>
                            <div class="fw-semibold">{{ $preinscripcion->nombres }}</div>
                            <small class="text-muted">{{ $preinscripcion->apellido_paterno }} {{ $preinscripcion->apellido_materno }}</small>
                          </td>
                          <td>{{ $preinscripcion->dni }}</td>
                          <td>
                            {{ $preinscripcion->programa_estudios }}
                            <div><small class="text-muted">
                              @if($preinscripcion->ciclo == 'intensivo') Intensivo
                              @elseif($preinscripcion->ciclo == 'ordinario_I') Ordinario I
                              @else Ordinario II
                              @endif
                            </small></div>
                          </td>
                          <td>
                            @if($preinscripcion->estado == 'pendiente')
                              <span class="status-indicator" style="background:var(--accent)"></span>
                              <span class="badge-pendiente"><i class="bi bi-hourglass-split"></i> Pendiente</span>
                            @elseif($preinscripcion->estado == 'aprobado')
                              <span class="status-indicator" style="background:var(--success)"></span>
                              <span class="badge-aprobado"><i class="bi bi-check-circle"></i> Aprobado</span>
                            @else
                              <span class="status-indicator" style="background:var(--danger)"></span>
                              <span class="badge-rechazado"><i class="bi bi-x-circle"></i> Rechazado</span>
                            @endif
                          </td>
                          <td>
                            <div class="action-buttons">
                              <button class="btn btn-view btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $preinscripcion->id }}" aria-label="Ver detalles">
                                <i class="bi bi-eye"></i>
                              </button>

                              @if($preinscripcion->estado == 'pendiente')
                                <a href="{{ route('preinscripciones.aprobar', $preinscripcion->id) }}"
                                   class="btn btn-approve btn-sm"
                                   onclick="return confirm('¿Estás seguro de aprobar esta preinscripción? Se notificará al estudiante por WhatsApp.');"
                                   title="Aprobar">
                                  <i class="bi bi-check-lg"></i>
                                </a>

                                <a href="{{ route('preinscripciones.rechazar', $preinscripcion->id) }}"
                                   class="btn btn-reject btn-sm"
                                   onclick="return confirm('¿Estás seguro de rechazar esta preinscripción? Se notificará al estudiante por WhatsApp.');"
                                   title="Rechazar">
                                  <i class="bi bi-x-lg"></i>
                                </a>
                              @endif

                              <a href="https://wa.me/51{{ $preinscripcion->watsap_propio }}"
                                 class="btn btn-whatsapp btn-sm"
                                 target="_blank"
                                 rel="noopener noreferrer"
                                 data-status="{{ $preinscripcion->estado }}"
                                 title="Contactar por WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                              </a>
                            </div>
                          </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="viewModal{{ $preinscripcion->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $preinscripcion->id }}" aria-hidden="true">
                          <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header bg-primary">
                                <h5 class="modal-title" id="viewModalLabel{{ $preinscripcion->id }}">
                                  <i class="bi bi-person-lines-fill me-2"></i> Detalles de Preinscripción #{{ $preinscripcion->id }}
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                              </div>

                              <div class="modal-body">
                                <div class="text-center mb-4">
                                  @if($preinscripcion->foto_perfil)
                                    <img loading="lazy" src="{{ asset($preinscripcion->foto_perfil) }}" alt="Foto perfil" class="modal-profile-img">
                                    <div class="mt-2">
                                      <a href="{{ asset($preinscripcion->foto_perfil) }}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-zoom-in"></i> Ampliar Foto
                                      </a>
                                    </div>
                                  @else
                                    <div class="modal-profile-img d-flex align-items-center justify-content-center bg-secondary text-white mx-auto">
                                      <i class="bi bi-exclamation-triangle" style="font-size:2.2rem"></i>
                                    </div>
                                    <p class="text-danger mt-2">Foto de perfil no disponible</p>
                                  @endif
                                </div>

                                <div class="row g-3">
                                  <div class="col-md-6">
                                    <div class="card mb-0">
                                      <div class="card-body">
                                        <h6 class="fw-semibold"><i class="bi bi-person-vcard me-2"></i> Datos Personales</h6>
                                        <hr>
                                        <p class="mb-1"><strong>Nombres:</strong> {{ $preinscripcion->nombres }}</p>
                                        <p class="mb-1"><strong>Apellidos:</strong> {{ $preinscripcion->apellido_paterno }} {{ $preinscripcion->apellido_materno }}</p>
                                        <p class="mb-1"><strong>DNI:</strong> {{ $preinscripcion->dni }}</p>
                                        <p class="mb-1"><strong>Fecha Nac.:</strong> {{ date('d/m/Y', strtotime($preinscripcion->fecha_nacimiento)) }} ({{ \Carbon\Carbon::parse($preinscripcion->fecha_nacimiento)->age }} años)</p>
                                        <p class="mb-0"><strong>Sexo:</strong> {{ ucfirst($preinscripcion->sexo) }}</p>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="card mb-0">
                                      <div class="card-body">
                                        <h6 class="fw-semibold"><i class="bi bi-telephone me-2"></i> Contacto</h6>
                                        <hr>
                                        <p class="mb-1"><strong>WhatsApp:</strong> 51{{ $preinscripcion->watsap_propio }}</p>
                                        <p class="mb-1"><strong>WhatsApp Apoderado:</strong> 51{{ $preinscripcion->watsap_apoderado }}</p>
                                        <p class="mb-0"><strong>Ubicación:</strong> {{ $preinscripcion->departamento }} - {{ $preinscripcion->provincia }} - {{ $preinscripcion->distrito }}</p>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="card mb-0">
                                      <div class="card-body">
                                        <h6 class="fw-semibold"><i class="bi bi-book me-2"></i> Información Académica</h6>
                                        <hr>
                                        <p class="mb-1"><strong>Programa:</strong> {{ $preinscripcion->programa_estudios }}</p>
                                        <p class="mb-1"><strong>Ciclo:</strong>
                                          @if($preinscripcion->ciclo == 'intensivo') Intensivo
                                          @elseif($preinscripcion->ciclo == 'ordinario_I') Ordinario I
                                          @else Ordinario II
                                          @endif
                                        </p>
                                        <p class="mb-0"><strong>Colegio:</strong> {{ $preinscripcion->colegio_procedencia }}</p>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="card mb-0">
                                      <div class="card-body">
                                        <h6 class="fw-semibold"><i class="bi bi-cash-coin me-2"></i> Información de Pago</h6>
                                        <hr>
                                        <p class="mb-1"><strong>N° Recibo:</strong> {{ $preinscripcion->numero_recibo }}</p>
                                        <p class="mb-1"><strong>Fecha Pago:</strong> {{ date('d/m/Y', strtotime($preinscripcion->fecha_pago)) }}</p>
                                        <p class="mb-1"><strong>Monto:</strong> S/ {{ number_format($preinscripcion->monto_pagado, 2) }}</p>
                                        <p class="mb-0"><strong>Estado Pago:</strong>
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

                                <div class="card mt-3">
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                      @if($preinscripcion->estado == 'pendiente')
                                        <span class="badge-pendiente"><i class="bi bi-hourglass-split"></i> Pendiente de revisión</span>
                                      @elseif($preinscripcion->estado == 'aprobado')
                                        <span class="badge-aprobado"><i class="bi bi-check-circle"></i> Aprobada</span>
                                      @else
                                        <span class="badge-rechazado"><i class="bi bi-x-circle"></i> Rechazada</span>
                                      @endif
                                    </div>
                                    <div class="text-muted"><small>Registrado: {{ $preinscripcion->created_at->format('d/m/Y H:i') }}</small></div>
                                  </div>
                                </div>

                              </div>

                              <div class="modal-footer">
                                @if($preinscripcion->estado == 'pendiente')
                                  <a href="{{ route('preinscripciones.aprobar', $preinscripcion->id) }}" class="btn btn-approve"
                                     onclick="return confirm('¿Estás seguro de aprobar esta preinscripción? Se notificará al estudiante por WhatsApp.');">
                                    <i class="bi bi-check-lg me-1"></i> Aprobar
                                  </a>
                                  <a href="{{ route('preinscripciones.rechazar', $preinscripcion->id) }}" class="btn btn-reject"
                                     onclick="return confirm('¿Estás seguro de rechazar esta preinscripción? Se notificará al estudiante por WhatsApp.');">
                                    <i class="bi bi-x-lg me-1"></i> Rechazar
                                  </a>
                                @endif

                                <a href="https://wa.me/51{{ $preinscripcion->watsap_propio }}" class="btn btn-whatsapp" target="_blank" rel="noopener">
                                  <i class="bi bi-whatsapp me-1"></i> Contactar al Estudiante
                                </a>

                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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

                <div class="p-3">
                  @if($preinscripciones->isEmpty())
                    <div class="empty-state">
                      <i class="bi bi-file-earmark-excel" style="font-size:2.2rem;color:var(--muted)"></i>
                      <h5 class="mt-2">No hay preinscripciones registradas</h5>
                      <p class="text-muted mb-0">No se encontraron registros con los criterios de búsqueda actuales.</p>
                    </div>
                  @endif
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  (function(){
    'use strict';

    // Elements
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');
    const screenOverlay = document.getElementById('screenOverlay');
    const navList = Array.from(document.querySelectorAll('.nav-item'));
    const btnLogout = document.getElementById('btnLogout');

    // Mobile toggle behavior
    toggleBtn.addEventListener('click', function() {
      const open = sidebar.classList.toggle('show');
      screenOverlay.style.display = open ? 'block' : 'none';
      this.setAttribute('aria-expanded', String(open));
    });
    screenOverlay.addEventListener('click', function(){
      sidebar.classList.remove('show');
      this.style.display = 'none';
      toggleBtn.setAttribute('aria-expanded', 'false');
    });

    // Navigation click: keep behavior but ensure we use href
    navList.forEach(el => {
      el.addEventListener('click', function(e){
        // allow native navigation if user opens in new tab
        // For iframe-based dashboard you can call window.cbtLoadSection(href, el)
        // but here we keep simple: navigate top-level
        // If you prefer to load in iframe, replace location.href with cbtLoadSection usage.
        // For now we use location to ensure routes/load work and avoid 404 flickers.
        e.preventDefault();
        const href = this.getAttribute('href') || this.dataset.url;
        if(!href) return;
        // If user wants SPA behavior, they can use existing cbtLoadSection from previous layout.
        window.location.href = href;
      });
    });

    // WhatsApp contact confirmation for pending status
    document.addEventListener('click', function(e){
      const target = e.target.closest('a[data-status]');
      if(!target) return;
      const status = target.getAttribute('data-status');
      if(status === 'pendiente'){
        const ok = confirm('Esta preinscripción aún está pendiente. ¿Desea contactar al estudiante de todas formas?');
        if(!ok) e.preventDefault();
      }
    });

    // Tooltips init (safe)
    try {
      const tt = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      tt.forEach(el => new bootstrap.Tooltip(el));
    } catch(e){ /* ignore */ }

    // Modal focus accessibility: focus close button when shown
    document.querySelectorAll('.modal').forEach(mod => {
      mod.addEventListener('shown.bs.modal', function() {
        const btn = this.querySelector('.btn-close');
        if(btn) btn.focus();
      });
    });

    // Logout
    if(btnLogout){
      btnLogout.addEventListener('click', function(){
        if(window.Swal){
          Swal.fire({
            title: 'Cerrar sesión?',
            text: 'Se cerrará tu sesión actual.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, salir',
            cancelButtonText: 'Cancelar'
          }).then(res => { if(res.isConfirmed) document.getElementById('logout-form').submit(); });
        } else {
          if(confirm('¿Cerrar sesión?')) document.getElementById('logout-form').submit();
        }
      });
    }

    // Responsive: ensure sidebar hidden on small load
    function handleResize(){
      if(window.innerWidth <= 1200){
        sidebar.classList.remove('show');
        screenOverlay.style.display = 'none';
        toggleBtn.setAttribute('aria-expanded', 'false');
      }
    }
    window.addEventListener('resize', handleResize);
    document.addEventListener('DOMContentLoaded', handleResize);
  })();
  </script>
</body>
</html>
