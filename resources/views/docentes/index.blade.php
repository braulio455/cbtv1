<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    :root {
      --vino-claro: #B76E79;
      --vino: #9A4C5F;
      --vino-oscuro: #7A3A4A;
      --dorado: #D4AF37;
      --dorado-oscuro: #B8941F;
      --dorado-claro: #F8F2E6;
      --crema: #FDF8F5;
      --radius: 0;
      --shadow: 0 4px 20px rgba(154, 76, 95, 0.1);
      --shadow-hover: 0 8px 30px rgba(154, 76, 95, 0.15);
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
      border-radius: 0 !important;
    }

    body {
      background: linear-gradient(135deg, var(--crema) 0%, #ffffff 100%);
      font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
      color: #5A4A4E;
      padding: 0;
      min-height: 100vh;
      line-height: 1.6;
    }

    .container {
      max-width: 1400px;
      padding: 2rem;
    }

    /* Header Styles */
    .main-header {
      background: linear-gradient(135deg, var(--vino-claro) 0%, var(--vino) 100%);
      color: white;
      padding: 2rem 0;
      margin-bottom: 2rem;
      border-bottom: 4px solid var(--dorado);
      box-shadow: var(--shadow);
      position: relative;
      overflow: hidden;
    }

    .main-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
      opacity: 0.1;
    }

    .main-header h1 {
      font-weight: 800;
      letter-spacing: -0.5px;
      margin: 0;
      font-size: 2.2rem;
      position: relative;
    }

    /* Button Styles */
    .btn-vino {
      background: linear-gradient(135deg, var(--vino-claro) 0%, var(--vino) 100%);
      color: white;
      font-weight: 600;
      border: none;
      padding: 0.75rem 1.5rem;
      transition: var(--transition);
      box-shadow: var(--shadow);
      position: relative;
      overflow: hidden;
    }

    .btn-vino:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-hover);
      color: white;
      background: linear-gradient(135deg, var(--vino) 0%, var(--vino-oscuro) 100%);
    }

    .btn-vino::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.6s;
    }

    .btn-vino:hover::before {
      left: 100%;
    }

    .btn-dorado {
      background: linear-gradient(135deg, var(--dorado) 0%, var(--dorado-oscuro) 100%);
      color: white;
      font-weight: 600;
      border: none;
      padding: 0.75rem 1.5rem;
      transition: var(--transition);
      box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
    }

    .btn-dorado:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
      color: white;
      background: linear-gradient(135deg, var(--dorado-oscuro) 0%, var(--dorado) 100%);
    }

    .btn-outline-vino {
      border: 2px solid var(--vino-claro);
      color: var(--vino);
      font-weight: 600;
      background: transparent;
      padding: 0.6rem 1.25rem;
      transition: var(--transition);
    }

    .btn-outline-vino:hover {
      background: var(--vino-claro);
      color: white;
      transform: translateY(-2px);
    }

    /* Card Styles */
    .card {
      border: 1px solid #e8e1e3;
      background: white;
      box-shadow: var(--shadow);
      margin-bottom: 1.5rem;
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background: linear-gradient(to bottom, var(--vino-claro), var(--dorado));
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-hover);
    }

    .card-header {
      background: linear-gradient(135deg, #f9f2f4 0%, white 100%);
      border-bottom: 2px solid #f9f2f4;
      padding: 1.25rem 1.5rem;
      font-weight: 700;
      color: var(--vino);
      font-size: 1.1rem;
    }

    /* Form Styles */
    .form-control {
      border: 2px solid #e8e1e3;
      padding: 0.75rem 1rem;
      transition: var(--transition);
      font-size: 0.95rem;
    }

    .form-control:focus {
      border-color: var(--dorado);
      box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.15);
    }

    .form-control.is-valid {
      border-color: #28a745;
      box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
    }

    .form-control.is-invalid {
      border-color: #dc3545;
      box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }

    .form-label {
      font-weight: 600;
      color: var(--vino);
      margin-bottom: 0.5rem;
    }

    /* Validation Styles */
    .valid-feedback, .invalid-feedback {
      font-weight: 500;
      font-size: 0.85rem;
    }

    .valid-feedback {
      color: #28a745;
    }

    .invalid-feedback {
      color: #dc3545;
    }

    /* Alert Styles */
    .alert {
      border: none;
      padding: 1rem 1.25rem;
      margin-bottom: 1.5rem;
      box-shadow: var(--shadow);
      border-left: 4px solid var(--vino-claro);
    }

    .alert-success {
      background: #f0f9f0;
      color: #0f5132;
      border-left-color: #28a745;
    }

    .alert-danger {
      background: #f8d7da;
      color: #721c24;
      border-left-color: #dc3545;
    }

    .alert-info {
      background: var(--dorado-claro);
      color: #856404;
      border-left-color: var(--dorado);
    }

    /* Accordion Styles */
    .accordion-item {
      border: 1px solid #e8e1e3;
      margin-bottom: 1rem;
      box-shadow: var(--shadow);
      transition: var(--transition);
    }

    .accordion-item:hover {
      box-shadow: var(--shadow-hover);
    }

    .accordion-button {
      background: linear-gradient(135deg, #f9f2f4 0%, white 100%);
      color: var(--vino);
      font-weight: 600;
      padding: 1.25rem 1.5rem;
      border: none;
      transition: var(--transition);
    }

    .accordion-button:not(.collapsed) {
      background: linear-gradient(135deg, var(--vino-claro) 0%, var(--vino) 100%);
      color: white;
      box-shadow: none;
    }

    .accordion-button::after {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23B76E79'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
      transition: transform 0.3s ease;
    }

    .accordion-button:not(.collapsed)::after {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }

    .accordion-body {
      padding: 1.5rem;
      background: white;
    }

    /* Asignatura Styles */
    .asignatura-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.8rem 1rem;
      border: 1px solid #e8e1e3;
      background: white;
      margin-bottom: 0.5rem;
      transition: var(--transition);
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .asignatura-item:hover {
      background: #f9f2f4;
      transform: translateX(5px);
    }

    .btn-delete {
      background: var(--dorado);
      color: white;
      border: none;
      padding: 0.4rem 0.8rem;
      transition: var(--transition);
    }

    .btn-delete:hover {
      background: var(--dorado-oscuro);
      transform: scale(1.1);
    }

    /* Checkbox Styles */
    .form-check-input:checked {
      background-color: var(--vino);
      border-color: var(--vino);
    }

    .form-check-label {
      font-weight: 500;
      color: #5A4A4E;
    }

    /* Animation Classes */
    .fade-in {
      animation: fadeIn 0.5s ease-out;
    }

    .slide-down {
      animation: slideDown 0.4s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideDown {
      from { opacity: 0; max-height: 0; }
      to { opacity: 1; max-height: 1000px; }
    }

    /* Custom Scrollbar */
    .custom-scroll {
      max-height: 300px;
      overflow-y: auto;
    }

    .custom-scroll::-webkit-scrollbar {
      width: 6px;
    }

    .custom-scroll::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    .custom-scroll::-webkit-scrollbar-thumb {
      background: var(--vino-claro);
    }

    .custom-scroll::-webkit-scrollbar-thumb:hover {
      background: var(--vino);
    }

    /* Badge Styles */
    .badge-vino {
      background: var(--vino-claro);
      color: white;
      padding: 0.3rem 0.6rem;
      font-weight: 600;
      font-size: 0.75rem;
    }

    /* Input Group Styles */
    .input-group-text {
      background: var(--dorado-claro);
      border: 2px solid #e8e1e3;
      border-right: none;
      color: var(--vino);
      font-weight: 600;
    }

    .input-group .form-control {
      border-left: none;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .container {
        padding: 1rem;
      }
      
      .main-header {
        padding: 1.5rem 0;
      }
      
      .main-header h1 {
        font-size: 1.75rem;
      }
      
      .btn {
        padding: 0.6rem 1.25rem;
      }
      
      .accordion-button {
        padding: 1rem 1.25rem;
        font-size: 0.95rem;
      }
    }

    /* Loading Animation */
    .loading {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255,255,255,.3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Floating Labels */
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
      color: var(--vino);
      font-weight: 600;
    }
  </style>
</head>
<body>
  <!-- Header -->
 
        <button class="btn btn-dorado" type="button" data-bs-toggle="collapse" data-bs-target="#listaDocentes" id="toggleDocentes">
          <i class="fas fa-eye me-2"></i> Mostrar Docentes
        </button>
      </div>
    </div>
  </div>

  <div class="container">
    <!-- Alert Messages -->
    <div class="alert-container">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show slide-down" role="alert">
          <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-3 fs-5"></i>
            <div>
              <strong>¡Éxito!</strong><br>
              @if (session('action') === 'store')
                El docente ha sido registrado correctamente.
              @elseif (session('action') === 'update')
                Los datos del docente han sido actualizados correctamente.
              @elseif (session('action') === 'delete')
                El docente ha sido eliminado correctamente.
              @endif
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
      @endif

      @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show slide-down" role="alert">
          <div class="d-flex align-items-center">
            <i class="fas fa-info-circle me-3 fs-5"></i>
            <div>
              <strong>Información:</strong><br>{{ session('info') }}
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show slide-down" role="alert">
          <div class="d-flex align-items-center mb-2">
            <i class="fas fa-exclamation-triangle me-3 fs-5"></i>
            <h5 class="mb-0">Error en el formulario</h5>
          </div>
          <p class="mb-2">Se encontraron errores al validar el formulario:</p>
          <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
              <li>{{ str_replace(['ya ha sido tomado', 'ya está en uso', 'ya esta tomado'], ['ya está registrado', 'ya está en uso', 'ya está registrado'], $error) }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
      @endif
    </div>

    <!-- Registration Card -->
    <div class="card fade-in">
      <div class="card-header">
        <i class="fas fa-user-plus me-2"></i> Registrar Nuevo Docente
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('docentes.store') }}" class="row g-3" id="registroForm" novalidate>
          @csrf
          <div class="col-md-6">
            <label class="form-label">Nombres <span class="text-danger">*</span></label>
            <input name="nombres" class="form-control" placeholder="Ingrese los nombres" required value="{{ old('nombres') }}">
            <div class="invalid-feedback">Por favor ingrese los nombres del docente.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Apellidos <span class="text-danger">*</span></label>
            <input name="apellidos" class="form-control" placeholder="Ingrese los apellidos" required value="{{ old('apellidos') }}">
            <div class="invalid-feedback">Por favor ingrese los apellidos del docente.</div>
          </div>
          <div class="col-md-4">
            <label class="form-label">DNI <span class="text-danger">*</span></label>
            <input name="dni" class="form-control" placeholder="8 dígitos" required pattern="\d{8}" title="El DNI debe tener exactamente 8 dígitos" value="{{ old('dni') }}">
            <div class="invalid-feedback">El DNI debe tener exactamente 8 dígitos numéricos.</div>
          </div>
          <div class="col-md-4">
            <label class="form-label">Teléfono <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text">+51</span>
              <input name="telefono" class="form-control" placeholder="9########" required pattern="9\d{8}" title="El teléfono debe empezar con 9 y tener 9 dígitos" value="{{ old('telefono') }}">
            </div>
            <div class="invalid-feedback">El teléfono debe empezar con 9 y tener 9 dígitos en total.</div>
          </div>
          <div class="col-md-4">
            <label class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
            <input type="email" name="correo_electronico" class="form-control" placeholder="ejemplo@dominio.com" required value="{{ old('correo_electronico') }}">
            <div class="invalid-feedback">Por favor ingrese un correo electrónico válido.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Dirección <span class="text-danger">*</span></label>
            <input name="direccion" class="form-control" placeholder="Dirección completa" required value="{{ old('direccion') }}">
            <div class="invalid-feedback">Por favor ingrese la dirección del docente.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Especialidad <span class="text-danger">*</span></label>
            <input name="especialidad" class="form-control" placeholder="Especialidad del docente" required value="{{ old('especialidad') }}">
            <div class="invalid-feedback">Por favor ingrese la especialidad del docente.</div>
          </div>
          <div class="col-12 text-end">
            <button type="submit" class="btn btn-vino" id="submitBtn">
              <i class="fas fa-save me-2"></i> Registrar Docente
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Docentes List -->
    <div class="collapse" id="listaDocentes">
      <div class="accordion" id="accordionDocentes">
        @foreach($docentes as $docente)
        <div class="accordion-item fade-in">
          <h2 class="accordion-header" id="heading{{ $docente->id }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $docente->id }}">
              <div class="d-flex justify-content-between align-items-center w-100 me-3">
                <div>
                  <span class="fw-bold">{{ $docente->nombres }} {{ $docente->apellidos }}</span>
                  <span class="badge-vino ms-2">DNI: {{ $docente->dni }}</span>
                </div>
                <div class="text-muted small">
                  <i class="fas fa-book me-1"></i>{{ $docente->asignaturas->count() }} asignatura(s)
                </div>
              </div>
            </button>
          </h2>
          <div id="collapse{{ $docente->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionDocentes">
            <div class="accordion-body">
              <!-- Docente Info -->
              <div class="row mb-4">
                <div class="col-md-4">
                  <strong><i class="fas fa-graduation-cap me-2 text-vino"></i>Especialidad:</strong>
                  <span class="ms-2">{{ $docente->especialidad }}</span>
                </div>
                <div class="col-md-4">
                  <strong><i class="fas fa-phone me-2 text-vino"></i>Teléfono:</strong>
                  <span class="ms-2">{{ $docente->telefono }}</span>
                </div>
                <div class="col-md-4">
                  <strong><i class="fas fa-envelope me-2 text-vino"></i>Correo:</strong>
                  <span class="ms-2">{{ $docente->correo_electronico }}</span>
                </div>
                <div class="col-12 mt-2">
                  <strong><i class="fas fa-map-marker-alt me-2 text-vino"></i>Dirección:</strong>
                  <span class="ms-2">{{ $docente->direccion }}</span>
                </div>
              </div>

              <!-- Edit Form -->
              <div class="card mb-4">
                <div class="card-header">
                  <i class="fas fa-edit me-2"></i> Editar Información
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('docentes.update', $docente) }}" class="row g-3" id="editForm-{{ $docente->id }}">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                      <label class="form-label">Nombres</label>
                      <input name="nombres" class="form-control" value="{{ $docente->nombres }}" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Apellidos</label>
                      <input name="apellidos" class="form-control" value="{{ $docente->apellidos }}" required>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">DNI</label>
                      <input name="dni" class="form-control" value="{{ $docente->dni }}" required pattern="\d{8}">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Teléfono</label>
                      <div class="input-group">
                        <span class="input-group-text">+51</span>
                        <input name="telefono" class="form-control" value="{{ $docente->telefono }}" required pattern="9\d{8}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Correo Electrónico</label>
                      <input name="correo_electronico" class="form-control" value="{{ $docente->correo_electronico }}" required type="email">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Dirección</label>
                      <input name="direccion" class="form-control" value="{{ $docente->direccion }}" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Especialidad</label>
                      <input name="especialidad" class="form-control" value="{{ $docente->especialidad }}" required>
                    </div>
                    <div class="col-12 text-end">
                      <button type="submit" class="btn btn-dorado">
                        <i class="fas fa-save me-2"></i> Guardar Cambios
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Asignación de Asignaturas -->
              <div class="card mb-4">
                <div class="card-header">
                  <i class="fas fa-tasks me-2"></i> Asignar Asignaturas
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('docentes.asignar', $docente) }}">
                    @csrf
                    <div class="custom-scroll border p-3 bg-light mb-3">
                      @foreach($grupos as $grupo)
                        <div class="mb-3">
                          <h6 class="text-vino mb-2">
                            <i class="fas fa-folder me-2"></i>Grupo: {{ $grupo->nombre }}
                          </h6>
                          <div class="row">
                            @foreach($grupo->asignaturas as $asig)
                              <div class="col-md-6 mb-2">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="asignaturas[]" value="{{ $asig->id }}" id="asig{{ $docente->id }}-{{ $asig->id }}" {{ $docente->asignaturas->contains($asig->id) ? 'checked' : '' }}>
                                  <label class="form-check-label" for="asig{{ $docente->id }}-{{ $asig->id }}">
                                    {{ $asig->nombre }}
                                  </label>
                                </div>
                              </div>
                            @endforeach
                          </div>
                          @if(!$loop->last)
                            <hr class="my-3">
                          @endif
                        </div>
                      @endforeach
                    </div>
                    <button class="btn btn-vino w-100">
                      <i class="fas fa-save me-2"></i> Guardar Asignaciones
                    </button>
                  </form>
                </div>
              </div>

              <!-- Asignaciones Actuales -->
              @if($docente->asignaturas->count())
                <div class="card">
                  <div class="card-header">
                    <i class="fas fa-list-check me-2"></i> Asignaciones Actuales
                  </div>
                  <div class="card-body">
                    @foreach($docente->asignaturas as $asig)
                      <div class="asignatura-item">
                        <div>
                          <strong>{{ $asig->grupo->nombre }}</strong> → {{ $asig->nombre }}
                        </div>
                        <form method="POST" action="{{ route('docentes.eliminarAsignacion', $asig->pivot->id) }}">
                          @csrf
                          @method('DELETE')
                          <button class="btn-delete btn-sm" title="Eliminar asignación">
                            <i class="fas fa-times"></i>
                          </button>
                        </form>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif

              <!-- Delete Button -->
              <div class="text-end mt-4">
                <form method="POST" action="{{ route('docentes.destroy', $docente) }}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" onclick="confirmDelete(this)" class="btn btn-outline-vino">
                    <i class="fas fa-trash me-2"></i> Eliminar Docente
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Advanced Form Validation and UX Enhancements
    document.addEventListener('DOMContentLoaded', function() {
      // Toggle button functionality
      const toggleBtn = document.getElementById('toggleDocentes');
      const listaDocentes = document.getElementById('listaDocentes');
      
      listaDocentes.addEventListener('show.bs.collapse', function () {
        toggleBtn.innerHTML = '<i class="fas fa-eye-slash me-2"></i> Ocultar Docentes';
        toggleBtn.classList.remove('btn-dorado');
        toggleBtn.classList.add('btn-vino');
      });
      
      listaDocentes.addEventListener('hide.bs.collapse', function () {
        toggleBtn.innerHTML = '<i class="fas fa-eye me-2"></i> Mostrar Docentes';
        toggleBtn.classList.remove('btn-vino');
        toggleBtn.classList.add('btn-dorado');
      });

      // Enhanced form validation
      const forms = document.querySelectorAll('form');
      forms.forEach(form => {
        // Real-time validation for all inputs
        const inputs = form.querySelectorAll('input[required]');
        inputs.forEach(input => {
          // Validate on input change
          input.addEventListener('input', function() {
            validateField(this);
          });

          // Validate on blur
          input.addEventListener('blur', function() {
            validateField(this);
          });
        });

        // Form submission validation
        form.addEventListener('submit', function(e) {
          if (!validateForm(this)) {
            e.preventDefault();
            showFormErrors(this);
          } else {
            // Add loading state to submit button
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
              const originalText = submitBtn.innerHTML;
              submitBtn.innerHTML = '<div class="loading me-2"></div> Procesando...';
              submitBtn.disabled = true;
              
              // Re-enable after 8 seconds in case of error
              setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
              }, 8000);
            }
          }
        });
      });

      // Phone number validation (Peru format)
      const phoneInputs = document.querySelectorAll('input[name="telefono"]');
      phoneInputs.forEach(input => {
        input.addEventListener('input', function() {
          // Remove any non-digit characters
          this.value = this.value.replace(/\D/g, '');
          
          // Ensure it starts with 9 and has max 9 digits
          if (this.value.length > 0 && this.value[0] !== '9') {
            this.value = '9' + this.value.slice(0, 8);
          }
          if (this.value.length > 9) {
            this.value = this.value.slice(0, 9);
          }
        });
      });

      // DNI validation (exactly 8 digits)
      const dniInputs = document.querySelectorAll('input[name="dni"]');
      dniInputs.forEach(input => {
        input.addEventListener('input', function() {
          // Remove any non-digit characters
          this.value = this.value.replace(/\D/g, '');
          
          // Limit to 8 digits
          if (this.value.length > 8) {
            this.value = this.value.slice(0, 8);
          }
        });
      });

      // Email validation
      const emailInputs = document.querySelectorAll('input[type="email"]');
      emailInputs.forEach(input => {
        input.addEventListener('input', function() {
          validateEmail(this);
        });
      });

      // Enhanced delete confirmation
      window.confirmDelete = function(button) {
        const form = button.closest('form');
        const docenteName = form.closest('.accordion-item').querySelector('.accordion-button span').textContent.trim();
        
        // Custom confirmation modal (you could replace with a Bootstrap modal)
        if (confirm(`¿Está seguro de eliminar al docente "${docenteName}"?\n\nEsta acción eliminará todas sus asignaciones y no se puede deshacer.`)) {
          // Add loading state
          const originalText = button.innerHTML;
          button.innerHTML = '<div class="loading me-2"></div> Eliminando...';
          button.disabled = true;
          
          form.submit();
        }
      };

      // Auto-expand first accordion when showing docentes
      listaDocentes.addEventListener('shown.bs.collapse', function() {
        const firstAccordion = document.querySelector('.accordion-button');
        if (firstAccordion && firstAccordion.classList.contains('collapsed')) {
          firstAccordion.click();
        }
      });

      // Add smooth scrolling to accordions
      const accordionButtons = document.querySelectorAll('.accordion-button');
      accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
          const target = document.querySelector(this.getAttribute('data-bs-target'));
          if (target) {
            setTimeout(() => {
              target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 350);
          }
        });
      });
    });

    // Validation functions
    function validateField(field) {
      const value = field.value.trim();
      let isValid = true;
      let message = '';

      // Required field validation
      if (field.hasAttribute('required') && value === '') {
        isValid = false;
        message = 'Este campo es obligatorio.';
      }

      // Pattern validation
      if (isValid && field.hasAttribute('pattern')) {
        const pattern = new RegExp(field.getAttribute('pattern'));
        if (!pattern.test(value)) {
          isValid = false;
          message = field.getAttribute('title') || 'Formato inválido.';
        }
      }

      // Email validation
      if (isValid && field.type === 'email') {
        isValid = validateEmail(field);
        if (!isValid) {
          message = 'Por favor ingrese un correo electrónico válido.';
        }
      }

      // Update field state
      if (isValid) {
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
      } else {
        field.classList.remove('is-valid');
        field.classList.add('is-invalid');
      }

      return isValid;
    }

    function validateEmail(input) {
      const email = input.value.trim();
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const isValid = emailRegex.test(email);
      
      if (isValid) {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
      } else {
        input.classList.remove('is-valid');
        if (email !== '') input.classList.add('is-invalid');
      }
      
      return isValid;
    }

    function validateForm(form) {
      let isValid = true;
      const requiredFields = form.querySelectorAll('input[required]');
      
      requiredFields.forEach(field => {
        if (!validateField(field)) {
          isValid = false;
        }
      });
      
      return isValid;
    }

    function showFormErrors(form) {
      const firstInvalid = form.querySelector('.is-invalid');
      if (firstInvalid) {
        firstInvalid.focus();
        
        // Scroll to the first error with smooth animation
        firstInvalid.scrollIntoView({ 
          behavior: 'smooth', 
          block: 'center'
        });
        
        // Add shake animation to highlight the error
        firstInvalid.classList.add('animate__animated', 'animate__headShake');
        setTimeout(() => {
          firstInvalid.classList.remove('animate__animated', 'animate__headShake');
        }, 1000);
      }
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
      // Ctrl + D to toggle docentes list
      if (e.ctrlKey && e.key === 'd') {
        e.preventDefault();
        document.getElementById('toggleDocentes').click();
      }
      
      // Escape key to close all accordions
      if (e.key === 'Escape') {
        const openAccordions = document.querySelectorAll('.accordion-button:not(.collapsed)');
        openAccordions.forEach(btn => btn.click());
      }
    });

    // Add CSS for animations
    const style = document.createElement('style');
    style.textContent = `
      @keyframes headShake {
        0% { transform: translateX(0); }
        6.5% { transform: translateX(-6px) rotateY(-9deg); }
        18.5% { transform: translateX(5px) rotateY(7deg); }
        31.5% { transform: translateX(-3px) rotateY(-5deg); }
        43.5% { transform: translateX(2px) rotateY(3deg); }
        50% { transform: translateX(0); }
      }
      .animate__animated { animation-duration: 1s; animation-fill-mode: both; }
      .animate__headShake { animation-name: headShake; animation-timing-function: ease-in-out; }
    `;
    document.head.appendChild(style);
  </script>
</body>
</html>