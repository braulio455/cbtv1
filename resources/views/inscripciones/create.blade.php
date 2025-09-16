<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-vino: #6a0f1a;
            --color-vino-oscuro: #4a0a12;
            --color-dorado: #d4af37;
            --color-dorado-claro: #f8e8c8;
            --color-gris-claro: #f5f5f5;
            --color-texto: #333333;
            --color-exito: #28a745;
            --color-error: #dc3545;
            --color-info: #17a2b8;
        }
        body {
            background-color: var(--color-gris-claro);
            color: var(--color-texto);
            font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7;
            padding-bottom: 2rem;
        }
        .header {
            background: linear-gradient(135deg, var(--color-vino), var(--color-vino-oscuro));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-bottom: 5px solid var(--color-dorado);
        }
        .header h1 {
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .container-form {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin-bottom: 3rem;
            border-top: 4px solid var(--color-dorado);
        }
        .form-section {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px dashed #e0e0e0;
        }
        .form-section h3 {
            color: var(--color-vino);
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-left: 20px;
        }
        .form-section h3::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 10px;
            height: 30px;
            background-color: var(--color-dorado);
            border-radius: 3px;
        }
        .form-label {
            font-weight: 600;
            color: var(--color-vino);
            margin-bottom: 0.5rem;
        }
        .form-control, .form-select {
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--color-dorado);
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        }
        .btn-primary {
            background-color: var(--color-vino);
            border: none;
            border-radius: 6px;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }
        .btn-primary:hover {
            background-color: var(--color-vino-oscuro);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(106, 15, 26, 0.3);
        }
        .btn-primary:disabled {
            background-color: #cccccc;
            transform: none;
            box-shadow: none;
        }
        .required-field::after {
            content: " *";
            color: var(--color-error);
        }
        .file-upload-btn {
            border: 2px dashed #e0e0e0;
            border-radius: 6px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            background-color: #f9f9f9;
        }
        .file-upload-btn:hover {
            border-color: var(--color-dorado);
            background-color: rgba(212, 175, 55, 0.05);
        }
        .file-upload-input {
            display: none;
        }
        .file-upload-text {
            font-size: 0.9rem;
            color: #666;
        }
        .file-upload-preview {
            margin-top: 10px;
            max-width: 150px;
            max-height: 150px;
            display: none;
            border-radius: 4px;
            border: 1px solid #e0e0e0;
        }
        .error-message {
            color: var(--color-error);
            font-size: 0.875em;
            margin-top: 0.25rem;
            display: none;
        }
        .is-invalid {
            border-color: var(--color-error) !important;
        }
        .is-invalid ~ .error-message {
            display: block;
        }
        .alert-custom {
            border-left: 4px solid;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            border-left-color: var(--color-exito);
        }
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            border-left-color: var(--color-error);
        }
        .alert-info {
            background-color: rgba(23, 162, 184, 0.1);
            border-left-color: var(--color-info);
        }
        .loading-spinner {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-right: 8px;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        /* Optimizaciones responsivas */
        @media (max-width: 992px) {
            .container-form {
                padding: 2rem;
            }
        }
        @media (max-width: 768px) {
            .container-form {
                padding: 1.5rem;
            }
            .form-section h3 {
                font-size: 1.25rem;
            }
        }
        @media (max-width: 576px) {
            .container-form {
                padding: 1rem;
                border-radius: 0;
            }
            .form-control, .form-select {
                padding: 10px 12px;
            }
            .file-upload-btn {
                padding: 20px;
            }
        }
        /* Mejoras de accesibilidad */
        .form-control:focus, .form-select:focus {
            outline: 2px solid var(--color-dorado);
            outline-offset: 2px;
        }
        .btn-primary:focus {
            outline: 2px solid var(--color-dorado);
            outline-offset: 2px;
        }
        /* Optimización para campos requeridos */
        .required-field-label {
            position: relative;
        }
        .required-field-label::after {
            content: " *";
            color: var(--color-error);
            position: absolute;
            margin-left: 2px;
        }
    </style>
</head>
<body>
    <div class="container container-form">
        <!-- Mensajes de estado -->
        <div id="messageContainer">
            @if(session('success'))
                <div class="alert alert-custom alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>¡Éxito!</strong> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-custom alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>¡Error!</strong> {{ session('error') }}
                </div>
            @endif
            @if(session('info'))
                <div class="alert alert-custom alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Información:</strong> {{ session('info') }}
                </div>
            @endif
            @if($errors->any()))
                <div class="alert alert-custom alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Por favor corrige los siguientes errores:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form id="registrationForm" method="POST" action="{{ route('inscripciones.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <!-- Sección 1: Datos Personales -->
            <div class="form-section">
                <h3><i class="fas fa-user me-2"></i>Datos Personales</h3>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="apellido_paterno" class="form-label required-field-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
                        <div class="error-message" id="apellido_paterno_error">Por favor ingrese su apellido paterno</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="apellido_materno" class="form-label required-field-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}" required>
                        <div class="error-message" id="apellido_materno_error">Por favor ingrese su apellido materno</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nombres" class="form-label required-field-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres') }}" required>
                        <div class="error-message" id="nombres_error">Por favor ingrese sus nombres</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="dni" class="form-label required-field-label">Documento de Identidad (DNI)</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni') }}" required maxlength="8" pattern="\d{8}" inputmode="numeric">
                        <div class="error-message" id="dni_error">Por favor ingrese un DNI válido (8 dígitos)</div>
                        <div class="d-none mt-2" id="dni_checking">
                            <small class="text-muted"><i class="fas fa-spinner fa-spin me-1"></i> Verificando DNI...</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fecha_nacimiento" class="form-label required-field-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                               value="{{ old('fecha_nacimiento') }}"
                               max="{{ \Carbon\Carbon::now()->subYears(15)->format('Y-m-d') }}"
                               required>
                        <div class="error-message" id="fecha_nacimiento_error">Por favor ingrese su fecha de nacimiento (debe tener al menos 15 años)</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="sexo" class="form-label required-field-label">Sexo</label>
                        <select class="form-select" id="sexo" name="sexo" required>
                            <option value="">Seleccione</option>
                            <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="femenino" {{ old('sexo') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        <div class="error-message" id="sexo_error">Por favor seleccione su sexo</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="foto_perfil" class="form-label required-field-label">Comprobante de Pago</label>
                        <div class="file-upload">
                            <div class="file-upload-btn" onclick="document.getElementById('foto_perfil').click()">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-2" style="color: var(--color-vino);"></i>
                                <p class="file-upload-text">Haz clic o arrastra tu comprobante de pago aquí</p>
                                <p class="small text-muted">Formatos aceptados: JPG, PNG (Máx. 2MB)</p>
                                <img id="fotoPreview" class="file-upload-preview" src="{{ old('foto_perfil') ? asset('storage/temp/' . old('foto_perfil')) : '#' }}" alt="Vista previa de la foto" style="{{ old('foto_perfil') ? 'display: block;' : 'display: none;' }}">
                            </div>
                            <input type="file" class="file-upload-input" id="foto_perfil" name="foto_perfil" accept="image/jpeg, image/png" required>
                            <div class="error-message" id="foto_perfil_error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sección 2: Datos de Contacto -->
            <div class="form-section">
                <h3><i class="fas fa-phone-alt me-2"></i>Datos de Contacto</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="watsap_propio" class="form-label required-field-label">Número de WhatsApp Propio</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-whatsapp" style="color: #25D366;"></i></span>
                            <input type="text" class="form-control" id="watsap_propio" name="watsap_propio" value="{{ old('watsap_propio') }}" placeholder="Ej. 987654321" required maxlength="9" pattern="\d{9}" inputmode="numeric">
                        </div>
                        <div class="error-message" id="watsap_propio_error">Por favor ingrese un número válido (9 dígitos)</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="watsap_apoderado" class="form-label required-field-label">Número de WhatsApp (Apoderado)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-whatsapp" style="color: #25D366;"></i></span>
                            <input type="text" class="form-control" id="watsap_apoderado" name="watsap_apoderado" value="{{ old('watsap_apoderado') }}" placeholder="Ej. 987654321" required maxlength="9" pattern="\d{9}" inputmode="numeric">
                        </div>
                        <div class="error-message" id="watsap_apoderado_error">Por favor ingrese un número válido (9 dígitos)</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="parentesco" class="form-label required-field-label">Parentesco con el Apoderado</label>
                        <select class="form-select" id="parentesco" name="parentesco" required>
                            <option value="">Seleccione</option>
                            <option value="padre" {{ old('parentesco') == 'padre' ? 'selected' : '' }}>Padre</option>
                            <option value="madre" {{ old('parentesco') == 'madre' ? 'selected' : '' }}>Madre</option>
                            <option value="tio" {{ old('parentesco') == 'tio' ? 'selected' : '' }}>Tío</option>
                            <option value="tia" {{ old('parentesco') == 'tia' ? 'selected' : '' }}>Tía</option>
                            <option value="hermano" {{ old('parentesco') == 'hermano' ? 'selected' : '' }}>Hermano</option>
                            <option value="hermana" {{ old('parentesco') == 'hermana' ? 'selected' : '' }}>Hermana</option>
                            <option value="otro" {{ old('parentesco') == 'otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        <div class="error-message" id="parentesco_error">Por favor seleccione el parentesco</div>
                    </div>
                </div>
            </div>
            <!-- Sección 3: Datos Académicos -->
            <div class="form-section">
                <h3><i class="fas fa-graduation-cap me-2"></i>Datos Académicos</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="programa_estudios" class="form-label required-field-label">Programa de Estudios al que Postula</label>
                        <select class="form-select" id="programa_estudios" name="programa_estudios" required>
                            <option value="">Seleccione un programa</option>
                            @foreach($programas as $programa)
                                <option value="{{ $programa->nombre }}" {{ old('programa_estudios') == $programa->nombre ? 'selected' : '' }}>{{ $programa->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="error-message" id="programa_estudios_error">Por favor seleccione un programa de estudios</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="colegio_procedencia" class="form-label required-field-label">Colegio de Procedencia</label>
                        <input type="text" class="form-control" id="colegio_procedencia" name="colegio_procedencia" value="{{ old('colegio_procedencia') }}" required>
                        <div class="error-message" id="colegio_procedencia_error">Por favor ingrese el colegio de procedencia</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="ciclo" class="form-label required-field-label">Ciclo al que se Inscribe</label>
                        <select class="form-select" id="ciclo" name="ciclo" required>
                            <option value="">Seleccione</option>
                            <option value="intensivo" {{ old('ciclo') == 'intensivo' ? 'selected' : '' }}>Intensivo</option>
                            <option value="ordinario_I" {{ old('ciclo') == 'ordinario_I' ? 'selected' : '' }}>Ordinario I</option>
                            <option value="ordinario_II" {{ old('ciclo') == 'ordinario_II' ? 'selected' : '' }}>Ordinario II</option>
                        </select>
                        <div class="error-message" id="ciclo_error">Por favor seleccione el ciclo</div>
                    </div>
                </div>
            </div>
            <!-- Sección 4: Ubicación Geográfica -->
            <div class="form-section">
                <h3><i class="fas fa-map-marker-alt me-2"></i>Ubicación Geográfica</h3>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="departamento" class="form-label required-field-label">Departamento</label>
                        <select class="form-select" id="departamento" name="departamento" required>
                            <option value="">Seleccione un departamento</option>
                            <option value="Amazonas" {{ old('departamento') == 'Amazonas' ? 'selected' : '' }}>Amazonas</option>
                            <option value="Ancash" {{ old('departamento') == 'Ancash' ? 'selected' : '' }}>Ancash</option>
                            <option value="Apurímac" {{ old('departamento') == 'Apurímac' ? 'selected' : '' }}>Apurímac</option>
                            <option value="Arequipa" {{ old('departamento') == 'Arequipa' ? 'selected' : '' }}>Arequipa</option>
                            <option value="Ayacucho" {{ old('departamento') == 'Ayacucho' ? 'selected' : '' }}>Ayacucho</option>
                            <option value="Cajamarca" {{ old('departamento') == 'Cajamarca' ? 'selected' : '' }}>Cajamarca</option>
                            <option value="Callao" {{ old('departamento') == 'Callao' ? 'selected' : '' }}>Callao</option>
                            <option value="Cusco" {{ old('departamento') == 'Cusco' ? 'selected' : '' }}>Cusco</option>
                            <option value="Huancavelica" {{ old('departamento') == 'Huancavelica' ? 'selected' : '' }}>Huancavelica</option>
                            <option value="Huánuco" {{ old('departamento') == 'Huánuco' ? 'selected' : '' }}>Huánuco</option>
                            <option value="Ica" {{ old('departamento') == 'Ica' ? 'selected' : '' }}>Ica</option>
                            <option value="Junín" {{ old('departamento') == 'Junín' ? 'selected' : '' }}>Junín</option>
                            <option value="La Libertad" {{ old('departamento') == 'La Libertad' ? 'selected' : '' }}>La Libertad</option>
                            <option value="Lambayeque" {{ old('departamento') == 'Lambayeque' ? 'selected' : '' }}>Lambayeque</option>
                            <option value="Lima" {{ old('departamento') == 'Lima' ? 'selected' : '' }}>Lima</option>
                            <option value="Loreto" {{ old('departamento') == 'Loreto' ? 'selected' : '' }}>Loreto</option>
                            <option value="Madre de Dios" {{ old('departamento') == 'Madre de Dios' ? 'selected' : '' }}>Madre de Dios</option>
                            <option value="Moquegua" {{ old('departamento') == 'Moquegua' ? 'selected' : '' }}>Moquegua</option>
                            <option value="Pasco" {{ old('departamento') == 'Pasco' ? 'selected' : '' }}>Pasco</option>
                            <option value="Piura" {{ old('departamento') == 'Piura' ? 'selected' : '' }}>Piura</option>
                            <option value="Puno" {{ old('departamento') == 'Puno' ? 'selected' : '' }}>Puno</option>
                            <option value="San Martín" {{ old('departamento') == 'San Martín' ? 'selected' : '' }}>San Martín</option>
                            <option value="Tacna" {{ old('departamento') == 'Tacna' ? 'selected' : '' }}>Tacna</option>
                            <option value="Tumbes" {{ old('departamento') == 'Tumbes' ? 'selected' : '' }}>Tumbes</option>
                            <option value="Ucayali" {{ old('departamento') == 'Ucayali' ? 'selected' : '' }}>Ucayali</option>
                        </select>
                        <div class="error-message" id="departamento_error">Por favor seleccione un departamento</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="provincia" class="form-label required-field-label">Provincia</label>
                        <select class="form-select" id="provincia" name="provincia" required>
                            <option value="">Seleccione una provincia</option>
                            @if(old('departamento') && old('provincia'))
                                <option value="{{ old('provincia') }}" selected>{{ old('provincia') }}</option>
                            @endif
                        </select>
                        <div class="error-message" id="provincia_error">Por favor seleccione una provincia</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="distrito" class="form-label required-field-label">Distrito</label>
                        <select class="form-select" id="distrito" name="distrito" required>
                            <option value="">Seleccione un distrito</option>
                            @if(old('departamento') && old('provincia') && old('distrito'))
                                <option value="{{ old('distrito') }}" selected>{{ old('distrito') }}</option>
                            @endif
                        </select>
                        <div class="error-message" id="distrito_error">Por favor seleccione un distrito</div>
                    </div>
                </div>
            </div>
            <!-- Sección 5: Datos de Pago -->
            <div class="form-section">
                <h3><i class="fas fa-money-bill-wave me-2"></i>Datos de Pago</h3>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="numero_recibo" class="form-label required-field-label">Número de Recibo de ISTTA</label>
                        <input type="text" class="form-control" id="numero_recibo" name="numero_recibo" value="{{ old('numero_recibo') }}" required>
                        <div class="error-message" id="numero_recibo_error">Por favor ingrese el número de recibo</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fecha_pago" class="form-label required-field-label">Fecha de Pago</label>
                        <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="{{ old('fecha_pago') }}" required max="{{ date('Y-m-d') }}">
                        <div class="error-message" id="fecha_pago_error">Por favor ingrese una fecha válida (no puede ser posterior a hoy)</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="monto_pagado" class="form-label required-field-label">Monto Pagado</label>
                        <input type="number" step="0.01" class="form-control" id="monto_pagado" name="monto_pagado" value="{{ old('monto_pagado') }}" required min="0" inputmode="decimal">
                        <div class="error-message" id="monto_pagado_error">Por favor ingrese un monto válido</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="estado_pago" class="form-label required-field-label">Estado de Pago</label>
                        <select class="form-select" id="estado_pago" name="estado_pago" required>
                            <option value="">Seleccione</option>
                            <option value="pago_completado" {{ old('estado_pago') == 'pago_completado' ? 'selected' : '' }}>Pago Completado</option>
                            <option value="pago_pendiente" {{ old('estado_pago') == 'pago_pendiente' ? 'selected' : '' }}>Pago Pendiente</option>
                        </select>
                        <div class="error-message" id="estado_pago_error">Por favor seleccione el estado de pago</div>
                    </div>
                </div>
            </div>
            <!-- Sección 6: Términos y Condiciones -->
            <div class="form-section">
                <h3><i class="fas fa-file-signature me-2"></i>Términos y Condiciones</h3>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="acepto_terminos" name="acepto_terminos" {{ old('acepto_terminos') ? 'checked' : '' }} required>
                        <label class="form-check-label" for="acepto_terminos">
                            Acepto los <a href="#" data-bs-toggle="modal" data-bs-target="#terminosModal">Términos y Condiciones</a> de la Inscripción
                        </label>
                        <div class="error-message" id="acepto_terminos_error">Debe aceptar los términos y condiciones</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="como_se_entero" class="form-label required-field-label">¿Cómo se enteró de CBT?</label>
                    <select class="form-select" id="como_se_entero" name="como_se_entero" required>
                        <option value="">Seleccione</option>
                        <option value="amigos_familiares" {{ old('como_se_entero') == 'amigos_familiares' ? 'selected' : '' }}>Amigos/Familiares</option>
                        <option value="redes_sociales" {{ old('como_se_entero') == 'redes_sociales' ? 'selected' : '' }}>Redes Sociales</option>
                        <option value="radio_tv" {{ old('como_se_entero') == 'radio_tv' ? 'selected' : '' }}>Radio/TV</option>
                        <option value="volantes" {{ old('como_se_entero') == 'volantes' ? 'selected' : '' }}>Volantes/Publicidad</option>
                        <option value="ferias" {{ old('como_se_entero') == 'ferias' ? 'selected' : '' }}>Ferias Educativas</option>
                        <option value="otro" {{ old('como_se_entero') == 'otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                    <div class="error-message" id="como_se_entero_error">Por favor indique cómo se enteró de CBT</div>
                </div>
            </div>
            <button type="submit" id="btnRegistrar" class="btn btn-primary" disabled>
                <i class="fas fa-paper-plane me-2"></i>Enviar Inscripción
            </button>
        </form>
    </div>
    <!-- Modal Términos y Condiciones -->
    <div class="modal fade" id="terminosModal" tabindex="-1" aria-labelledby="terminosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-vino text-white">
                    <h5 class="modal-title" id="terminosModalLabel">Términos y Condiciones</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>1. Aceptación de los Términos</h5>
                    <p>Al completar y enviar este formulario de inscripción, usted acepta cumplir con todos los términos y condiciones establecidos por el Centro Básico Tecnológico (CBT).</p>
                    <h5>2. Exactitud de la Información</h5>
                    <p>Usted declara que toda la información proporcionada es veraz, completa y exacta. Cualquier falsedad en los datos proporcionados puede resultar en la anulación de su inscripción.</p>
                    <h5>3. Procesamiento de Datos Personales</h5>
                    <p>El CBT procesará sus datos personales de acuerdo con la Ley de Protección de Datos Personales (Ley N° 29733) y su Reglamento, únicamente para los fines relacionados con su proceso de admisión.</p>
                    <h5>4. Derechos ARCO</h5>
                    <p>Usted tiene derecho a acceder, rectificar, cancelar u oponerse al tratamiento de sus datos personales (Derechos ARCO), para lo cual puede contactarse con nuestro Oficial de Protección de Datos.</p>
                    <h5>5. Pagos y Reembolsos</h5>
                    <p>Los pagos realizados por concepto de inscripción son no reembolsables, excepto en casos de cancelación del programa por parte del CBT.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Datos completos de Perú para departamentos, provincias y distritos
          

const peruData = {
            "Amazonas": {
                provincias: {
                    "Chachapoyas": ["Chachapoyas", "Asunción", "Balsas", "Cheto", "Chiliquín", "Chuquibamba", "Granada", "Huancas", "La Jalca", "Leimebamba", "Levanto", "Magdalena", "Mariscal Castilla", "Molinopampa", "Montevideo", "Olleros", "Quinjalca", "San Francisco de Daguas", "San Isidro de Maino", "Soloco", "Sonche"],
                    "Bagua": ["Bagua", "Aramango", "Copallín", "El Parco", "Imaza", "La Peca"],
                    "Bongará": ["Jumbilla", "Chisquilla", "Churuja", "Corosha", "Cuispes", "Florida", "Jazán", "Recta", "San Carlos", "Shipasbamba", "Valera", "Yambrasbamba"],
                    "Condorcanqui": ["Santa María de Nieva", "El Cenepa", "Río Santiago"],
                    "Luya": ["Lámud", "Camporredondo", "Cocabamba", "Colcamar", "Conila", "Inguilpata", "Longuita", "Lonya Chico", "Luya", "Luya Viejo", "María", "Ocalli", "Ocumal", "Pisuquía", "Providencia", "San Cristóbal", "San Francisco del Yeso", "San Jerónimo", "San Juan de Lopecancha", "Santa Catalina", "Santo Tomás", "Tingo", "Trita"],
                    "Rodríguez de Mendoza": ["San Nicolás", "Chirimoto", "Cochamal", "Huambo", "Limabamba", "Longar", "Mariscal Benavides", "Milpuc", "Omia", "Santa Rosa", "Totora", "Vista Alegre"],
                    "Utcubamba": ["Bagua Grande", "Cajaruro", "Cumba", "El Milagro", "Jamalca", "Lonya Grande", "Yamón"]
                }
            },
            "Ancash": {
                provincias: {
                    "Huaraz": ["Huaraz", "Cochabamba", "Colcabamba", "Huanchay", "Independencia", "Jangas", "La Libertad", "Olleros", "Pampas Grande", "Pariacoto", "Pira", "Tarica"],
                    "Aija": ["Aija", "Coris", "Huacllán", "La Merced", "Succha"],
                    "Antonio Raymondi": ["Llamellín", "Aczo", "Chaccho", "Chingas", "Mirgas", "San Juan de Rontoy"],
                    "Asunción": ["Chacas", "Acochaca"],
                    "Bolognesi": ["Chiquián", "Abelardo Pardo Lezameta", "Antonio Raymondi", "Aquia", "Cajacay", "Canis", "Colquioc", "Huallanca", "Huasta", "Huayllacayán", "La Primavera", "Mangas", "Pacllón", "San Miguel de Corpanqui", "Ticllos"],
                    "Carhuaz": ["Carhuaz", "Acopampa", "Amashca", "Anta", "Ataquero", "Marcará", "Pariahuanca", "San Miguel de Aco", "Shilla", "Tinco", "Yungar"],
                    "Carlos Fermín Fitzcarrald": ["San Luis", "San Nicolás", "Yauya"],
                    "Casma": ["Casma", "Buena Vista Alta", "Comandante Noel", "Yaután"],
                    "Corongo": ["Corongo", "Aco", "Bambas", "Cusca", "La Pampa", "Yanac", "Yupán"],
                    "Huarí": ["Huarí", "Anra", "Cajay", "Chavín de Huántar", "Huacachi", "Huachis", "Huántar", "Masin", "Paucas", "Ponto", "Rahuapampa", "Rapayán", "San Marcos", "San Pedro de Chana", "Uco"],
                    "Huarmey": ["Huarmey", "Cochapeti", "Culebras", "Huayan", "Malvas"],
                    "Huaylas": ["Caraz", "Huallanca", "Huata", "Huaylas", "Mato", "Pamparomás", "Pueblo Libre", "Santa Cruz", "Santo Toribio", "Yuracmarca"],
                    "Mariscal Luzuriaga": ["Piscobamba", "Casca", "Eleazar Guzmán Barrón", "Fidel Olivas Escudero", "Llama", "Llumpa", "Lucma", "Musga"],
                    "Ocros": ["Ocros", "Acas", "Cajamarquilla", "Carhuapampa", "Cochas", "Congas", "Llipa", "San Cristóbal de Raján", "San Pedro", "Santiago de Chilcas"],
                    "Pallasca": ["Cabana", "Bolognesi", "Conchucos", "Huacaschuque", "Huandoval", "Lacabamba", "Llapo", "Pallasca", "Pampas", "Santa Rosa", "Tauca"],
                    "Pomabamba": ["Pomabamba", "Huayllán", "Parobamba", "Quinuabamba"],
                    "Recuay": ["Recuay", "Catac", "Cotaparaco", "Huayllapampa", "Llacllín", "Marca", "Pampas Chico", "Pararín", "Tapacocha", "Ticapampa"],
                    "Santa": ["Chimbote", "Cáceres del Perú", "Coishco", "Macate", "Moro", "Nepeña", "Samanco", "Santa", "Nuevo Chimbote"],
                    "Sihuas": ["Sihuas", "Acobamba", "Alfonso Ugarte", "Cashapampa", "Chingalpo", "Huayllabamba", "Quiches", "Ragash", "San Juan", "Sicsibamba"],
                    "Yungay": ["Yungay", "Cascapara", "Mancos", "Matacoto", "Quillo", "Ranrahirca", "Shupluy", "Yanama"]
                }
            },
            "Apurímac": {
                provincias: {
                    "Abancay": ["Abancay", "Chacoche", "Circa", "Curahuasi", "Huanipaca", "Lambrama", "Pichirhua", "San Pedro de Cachora", "Tamburco"],
                    "Andahuaylas": ["Andahuaylas", "Andarapa", "Chiara", "Huancarama", "Huancaray", "Huayana", "Kaquiabamba", "Kishuara", "Pacobamba", "Pacucha", "Pampachiri", "Pomacocha", "San Antonio de Cachi", "San Jerónimo", "San Miguel de Chaccrampa", "Santa María de Chicmo", "Talavera", "Tumay Huaraca", "Turpo"],
                    "Antabamba": ["Antabamba", "El Oro", "Huaquirca", "Juan Espinoza Medrano", "Oropesa", "Pachaconas", "Sabaino"],
                    "Aymaraes": ["Chalhuanca", "Capaya", "Caraybamba", "Chapimarca", "Colcabamba", "Cotaruse", "Huayllo", "Justo Apu Sahuaraura", "Lucre", "Pocohuanca", "San Juan de Chacña", "Sañayca", "Soraya", "Tapairihua", "Tintay", "Toraya", "Yanaca"],
                    "Chincheros": ["Chincheros", "Anco_Huallo", "Cocharcas", "Huaccana", "Ocobamba", "Ongoy", "Ranracancha", "Uranmarca"],
                    "Grau": ["Chuquibambilla", "Curpahuasi", "Gamarra", "Huayacundo Arma", "Mamara", "Micaela Bastidas", "Pataypampa", "Progreso", "San Antonio", "Santa Rosa", "Turpay", "Vilcabamba", "Virundo"],
                    "Cotabambas": ["Tambobamba", "Cotabambas", "Coyllurqui", "Haquira", "Mara", "Challhuahuacho"]
                }
            },
            "Arequipa": {
                provincias: {
                    "Arequipa": ["Arequipa", "Alto Selva Alegre", "Cayma", "Cerro Colorado", "Characato", "Chiguata", "Jacobo Hunter", "José Luis Bustamante y Rivero", "La Joyanca", "Mariano Melgar", "Miraflores", "Mollebaya", "Paucarpata", "Pocsi", "Polobaya", "Quequeña", "Sabandía", "Sachaca", "San Juan de Siguas", "San Juan de Tarucani", "Santa Isabel de Siguas", "Santa Rita de Siguas", "Socabaya", "Tiabaya", "Uchumayo", "Vitor", "Yanahuara", "Yarabamba", "Yura"],
                    "Camaná": ["Camaná", "José María Quimper", "Mariscal Cáceres", "Mariscal Cáceres", "Nicolás de Piérola", "Ocoña", "Quilca", "Samuel Pastor"],
                    "Caravelí": ["Caravelí", "Aplao", "Atico", "Atiquipa", "Bella Unión", "Cahuacho", "Chala", "Chaparra", "Huanuhuanu", "Jaquí", "Lomas", "Quicacha", "Yauca"],
                    "Castilla": ["Aplao", "Andagua", "Ayo", "Chachas", "Chilcaymarca", "Choco", "Huancarqui", "Machaguay", "Orcopampa", "Pampacolca", "Tipán", "Uñón", "Uraca", "Viraco"],
                    "Caylloma": ["Chivay", "Achoma", "Cabanaconde", "Callalli", "Caylloma", "Coporaque", "Huambo", "Huanca", "Ichupampa", "Lari", "Lluta", "Maca", "Madrigal", "San Antonio de Chuca", "Sibayo", "Tapay", "Tisco", "Tuti", "Yanque", "Majes"],
                    "Condesuyos": ["Chuquibamba", "Andaray", "Cayarani", "Chichas", "Iray", "Río Grande", "Salamanca", "Yanaquihua"],
                    "Islay": ["Mollendo", "Cocachacra", "Dean Valdivia", "Islay", "Mejía", "Punta de Bombón"],
                    "La Unión": ["Cotahuasi", "Alca", "Charcana", "Huaynacotas", "Pampamarca", "Puyca", "Quechualla", "Sayla", "Tauría", "Tomepampa", "Toraya"]
                }
            },
            "Ayacucho": {
                provincias: {
                    "Huamanga": ["Ayacucho", "Acocro", "Acos Vinchos", "Carmen Alto", "Chiara", "Ocros", "Pacaycasa", "Quinua", "San José de Ticllas", "San Juan Bautista", "Santiago de Pischa", "Socos", "Tambillo", "Vinchos", "Jesús Nazareno"],
                    "Cangallo": ["Cangallo", "Chuschi", "Los Morochucos", "María Parado de Bellido", "Parsería", "Totos"],
                    "Huanca Sancos": ["Sancos", "Carapo", "Sacsamarca", "Santiago de Lucanamarca"],
                    "Huanta": ["Huanta", "Ayahuanco", "Huancapi", "Iguanas", "Luricocha", "Santillana", "Sivia", "Llocllapampa"],
                    "La Mar": ["San Miguel", "Anco", "Ayna", "Chilcas", "Chungui", "Luis Carranza", "Santa Rosa", "Tambo"],
                    "Lucanas": ["Puerto Inca", "Chaviña", "Chumpi", "San Cristóbal", "San Juan", "San Pedro", "San Pedro de Palco", "Sancos", "Santa Ana de Huaycahuacho", "Santa Lucía"],
                    "Parinacochas": ["Coracora", "Chumpi", "Coronel Castañeda", "Pacapausa", "Pullo", "Puyusca", "San Francisco de Ravacayco", "Upahuacho"],
                    "Paucar del Sara Sara": ["Pausa", "Colta", "Corculla", "Lampa", "Marcabamba", "Oyolo", "Pararca", "San Javier de Alpabamba", "San José de Ushua", "Sara Sara"],
                    "Sucre": ["Querobamba", "Belén", "Chalcos", "Chilcayoc", "Huacaña", "Morcollas", "Paico", "San Pedro de Larcay", "San Salvador de Quije", "Santiago de Paucaray", "Soras"],
                    "Victor Fajardo": ["Huancapi", "Alcamenca", "Apongo", "Asquipata", "Canaria", "Cayara", "Colca", "Huamanquiquia", "Huancaraylla", "Huaya", "Sarhua", "Vilcanchos"],
                    "Vilcas Huamán": ["Vilcas Huamán", "Accomarca", "Carhuanca", "Concepción", "Huambalpa", "Independencia", "Saurama", "Vischongo"]
                }
            },
            "Cajamarca": {
                provincias: {
                    "Cajamarca": ["Cajamarca", "Asunción", "Chetilla", "Cospán", "Encañada", "Jesús", "Llacanora", "Los Baños del Inca", "Magdalena", "Matara", "Namora", "San Juan"],
                    "Cajabamba": ["Cajabamba", "Cachachi", "Condebamba", "Sitacucho"],
                    "Celendín": ["Celendín", "Chumuch", "Cortada", "Huasmín", "Jorge Chávez", "José Gálvez", "Miguel Iglesias", "Oxamarca", "Sorochuco", "Sucre", "Utco", "La Libertad de Pallán"],
                    "Chota": ["Chota", "Anguía", "Chadin", "Chiguirip", "Chimchán", "Choropampa", "Cochabamba", "Conchán", "Huambos", "Lajas", "Llama", "Miracosta", "Paccha", "Pión", "Querocoto", "San Juan de Licupis", "Tacabamba", "Tocmoche", "San Francisco de Daguas"],
                    "Contumazá": ["Contumazá", "Chilete", "Cupisnique", "Guzmango", "San Benito", "Santa Cruz de Toledo", "Tantarica", "Yonán"],
                    "Cutervo": ["Cutervo", "Callayuc", "Choros", "Cujillo", "La Ramada", "Pimpingos", "Querocotillo", "San Andrés de Cutervo", "San Juan de Cutervo", "San Luis de Lucma", "Santa Cruz", "Santo Domingo de la Capilla", "Santo Tomás", "Socota", "Toribio Casanova"],
                    "Hualgayoc": ["Bambamarca", "Chugur", "Hualgayoc"],
                    "Jaén": ["Jaén", "Bellavista", "Chontalí", "Colasay", "Huabal", "Las Pirias", "Pomahuaca", "Pucará", "Sallique", "San Felipe", "San José del Alto", "Santa Rosa"],
                    "San Ignacio": ["San Ignacio", "Chirinos", "Huarango", "La Coipa", "Namballe", "San José de Lourdes", "Tabaconas"],
                    "San Marcos": ["Pedro Gálvez", "Chancay", "Eduardo Villanueva", "Gregorio Pita", "Ichocán", "José Manuel Quiroz", "José Sabogal"],
                    "San Miguel": ["San Miguel", "Bolívar", "Calquis", "Catilluc", "El Prado", "La Florida", "Llapa", "Nanchoc", "Niepos", "San Gregorio", "San Silvestre de Cochan", "Tongod", "Unión Agua Blanca"],
                    "San Pablo": ["San Pablo", "San Bernardino", "San Luis", "Tumbaden"],
                    "Santa Cruz": ["Santa Cruz", "Andabamba", "Catache", "Chancaybaños", "La Esperanza", "Ninabamba", "Pulán", "Saucepampa", "Sexi", "Uticyacu", "Yauyucán"]
                }
            },
            "Callao": {
                provincias: {
                    "Callao": ["Callao", "Bellavista", "Carmen de La Legua Reynoso", "La Perla", "La Punta", "Ventanilla"]
                }
            },
            "Cusco": {
                provincias: {
                    "Cusco": ["Cusco", "Ccorca", "Poroy", "San Jerónimo", "San Sebastián", "Santiago", "Saylla", "Wanchaq"],
                    "Acomayo": ["Acomayo", "Acopia", "Acos", "Mosoc Llacta", "Pomacanchi", "Rondocan", "Sangarará"],
                    "Anta": ["Anta", "Ancahuasi", "Cachimayo", "Chinchaypujio", "Huarocondo", "Limatambo", "Mollepata", "Pucyura", "Zurite"],
                    "Calca": ["Calca", "Coya", "Lamay", "Lares", "Pisac", "San Salvador", "Taray", "Yanatile"],
                    "Canas": ["Yanaoca", "Checca", "Kunturkanki", "Langui", "Layo", "Pampamarca", "Quehue", "Tupac Amaru"],
                    "Canchis": ["Sicuani", "Checacupe", "Combapata", "Marangani", "Pitumarca", "San Pablo", "San Pedro", "Tinta"],
                    "Chumbivilcas": ["Santo Tomás", "Capacmarca", "Chamaca", "Colquemarca", "Livitaca", "Llusco", "Quiñota", "Velille"],
                    "Espinar": ["Yauri", "Condoroma", "Coporaque", "Ocoruro", "Pallpata", "Pichigua", "Suyckutambo", "Alto Pichigua"],
                    "La Convención": ["Quillabamba", "Echarate", "Huayopata", "Maranura", "Ocobamba", "Pichari", "Santa Ana", "Santa Teresa", "Vilcabamba"],
                    "Paruro": ["Paruro", "Accha", "Ccapi", "Colcha", "Huanoquite", "Omacha", "Paccaritambo", "Pillpinto", "Yaurisque"],
                    "Paucartambo": ["Paucartambo", "Caicay", "Challabamba", "Colquepata", "Huancarani", "Kosñipata"],
                    "Quispicanchi": ["Urcos", "Andahuaylillas", "Camanti", "Ccarhuayo", "Ccatca", "Cusipata", "Huaro", "Lucre", "Marcapata", "Ocongate", "Oropesa", "Quiquijana"],
                    "Urubamba": ["Urubamba", "Chinchero", "Huayllabamba", "Machupicchu", "Maras", "Ollantaytambo", "Yucay"]
                }
            },
            "Huancavelica": {
                provincias: {
                    "Huancavelica": ["Huancavelica", "Acobambilla", "Acoria", "Conayca", "Cuenca", "Huachocolpa", "Huayllahuara", "Izcuchaca", "Laria", "Manta", "Mariscal Cáceres", "Moya", "Nuevo Occoro", "Palca", "Pilchaca", "Vilca", "Yauli", "Ascensión", "Huando"],
                    "Acobamba": ["Acobamba", "Andabamba", "Anta", "Caja", "Marcas", "Paucara", "Pomacocha", "Rosario"],
                    "Angaraes": ["Lircay", "Anchonga", "Callanmarca", "Ccochaccasa", "Chincho", "Congalla", "Huanchuy", "Huanca Huanca", "Huayllay Grande", "Julcamarca", "San Antonio de Antaparco", "Santo Tomás de Pata", "Secclla", "Carhuando"],
                    "Castrovirreyna": ["Castrovirreyna", "Arma", "Aurahua", "Capillas", "Chupamarca", "Cocas", "Huachos", "Huamatambo", "Mollepampa", "San Juan", "Santa Ana", "Tantara", "Ticrapo"],
                    "Churcampa": ["Churcampa", "Anco", "Chinchihuasi", "El Carmen", "La Merced", "Locroja", "Paucarbamba", "San Miguel de Mayocc", "San Pedro de Coris", "Pachamarca", "Cosme"],
                    "Huaytará": ["Huaytará", "Ayaví", "Córdova", "Huayacundo Arma", "Laramarca", "Ocoyo", "Pilpichaca", "Querco", "Quito-Arma", "San Antonio de Cusicancha", "San Francisco de Sangayaico", "San Isidro", "Santiago de Chocorvos", "Santiago de Quirahuara", "Santo Domingo de Capillas", "Tamayac"],
                    "Tayacaja": ["Pampas", "Acostambo", "Acraquia", "Ahuaycha", "Colcabamba", "Daniel Hernández", "Huachocolpa", "Huaribamba", "Ñahuimpuquio", "Pazos", "Quishuar", "Salcabamba", "Salcahuasi", "San Marcos de Rocchac", "Surcubamba", "Tintay Puncu", "Quichuas", "Andaymarca", "Roble", "Pichos", "Churcampa"]
                }
            },
            "Huánuco": {
                provincias: {
                    "Huánuco": ["Huánuco", "Amarilis", "Chinchao", "Churubamba", "Margos", "Quisqui", "San Francisco de Cayrán", "San Pedro de Chaulan", "Santa María del Valle", "Yarumayo", "Pillco Marca", "Yacus", "San Pablo de Pillao"],
                    "Ambo": ["Ambo", "Cayna", "Colpas", "Conchamarca", "Huacar", "San Francisco", "San Rafael", "Tomay Kichwa"],
                    "Dos de Mayo": ["La Unión", "Chuquis", "Mariano Dámaso Beraún", "Pachas", "Quivilla", "Ripán", "Shunqui", "Sillapata", "Yanas"],
                    "Huacaybamba": ["Huacaybamba", "Canchabamba", "Cochabamba", "Pinra"],
                    "Huamalíes": ["Llata", "Arancay", "Chavín de Pariarca", "Jacas Grande", "Jircan", "Miraflores", "Monzón", "Punchao", "Puños", "Singa", "Tantamayo"],
                    "Leoncio Prado": ["Rupa-Rupa", "Daniel Alomía Robles", "Hermilio Valdizán", "José Crespo y Castillo", "Luyando", "Mariano Dámaso Beraún", "Pueblo Nuevo", "Castillo Grande", "Pucayacu", "Santa Rosa de Alto Yanajanca"],
                    "Marañón": ["Huacrachuco", "Cholon", "San Buenaventura"],
                    "Pachitea": ["Panao", "Chaglla", "Molino", "Umari"],
                    "Puerto Inca": ["Puerto Inca", "Codo del Pozuzo", "Honoria", "Tournavista", "Yuyapichis"],
                    "Lauricocha": ["Jesús", "Baños", "Jivia", "Queropalca", "Rondos", "San Francisco de Asís", "San Miguel de Cauri"],
                    "Yarowilca": ["Chavinillo", "Cahuac", "Chacabamba", "Chupán", "Jacas Chico", "Obas", "Pampamarca", "Choras"]
                }
            },
            "Ica": {
                provincias: {
                    "Ica": ["Ica", "La Tinguiña", "Los Aquijes", "Ocucaje", "Pachacútec", "Parcona", "Pueblo Nuevo", "Salas", "San José de Los Molinos", "San Juan Bautista", "Santiago", "Subtanjalla", "Tate", "Yauca del Rosario"],
                    "Chincha": ["Chincha Alta", "Alto Larán", "Chavín", "Chincha Baja", "El Carmen", "Grocio Prado", "Pueblo Nuevo", "San Juan de Yanac", "San Pedro de Huacarpana", "Sunampe", "Tambo de Mora"],
                    "Nazca": ["Nazca", "Changillo", "El Ingenio", "Marcona", "Vista Alegre"],
                    "Palpa": ["Palpa", "Llipata", "Río Grande", "Santa Cruz", "Tibillo"],
                    "Pisco": ["Pisco", "Huancano", "Humay", "Independencia", "Paracas", "San Andrés", "San Clemente", "Túpac Amaru Inca"]
                }
            },
            "Junín": {
                provincias: {
                    "Huancayo": ["Huancayo", "Carhuacallanga", "Chacapampa", "Chicche", "Chilca", "Chongos Alto", "Chupuro", "Colca", "Cullhuas", "El Tambo", "Huacrapuquio", "Hualhuas", "Huancán", "Huasicancha", "Huayucachi", "Ingenio", "Pariahuanca", "Pilcomayo", "Pucará", "Quichuay", "Quilcas", "San Agustín", "San Jerónimo de Tunán", "Santo Domingo de Acobamba", "Saño", "Sapallanga", "Sicaya", "Viques", "Vitis"],
                    "Concepción": ["Concepción", "Aco", "Andamarca", "Chambara", "Coipas", "Comas", "Heroínas Toledo", "Manzanares", "Mariscal Castilla", "Matahuasi", "Mito", "Nueve de Julio", "Ortiz de Zevallos", "San José de Quero", "Santa Rosa de Ocopa"],
                    "Chanchamayo": ["Chanchamayo", "Perené", "Pichanaqui", "San Luis de Shuaro", "San Ramón", "Vitoc"],
                    "Jauja": ["Jauja", "Acolla", "Apata", "Ataura", "Canchayllo", "Curicaca", "El Mantaro", "Huamali", "Huaripampa", "Huertas", "Janjaillo", "Julcán", "Leonor Ordóñez", "Llocllapampa", "Marco", "Masma", "Masma Chicche", "Molinos", "Monobamba", "Muqui", "Muquiyauyo", "Paca", "Paccha", "Pancán", "Parco", "Pomacancha", "Ricrán", "San Lorenzo", "San Pedro de Chunan", "Sausa", "Sincos", "Tunan Marca", "Yauyos"],
                    "Junín": ["Junín", "Carhuamayo", "Ondores", "Ulcumayo"],
                    "Satipo": ["Satipo", "Coviriali", "Llaylla", "Mazamari", "Pampa Hermosa", "Pangoa", "Río Negro", "Río Tambo", "Vizcatán del Ene"],
                    "Tarma": ["Tarma", "Acobamba", "Huaricolca", "Huasahuasi", "La Unión", "Palca", "Palcamayo", "San Pedro de Cajas", "Tapo"],
                    "Yauli": ["La Oroya", "Chacapalpa", "Huay-Huay", "Marcapomacocha", "Morococha", "Paccha", "Santa Barbara de Carhuacayan", "Santa Rosa de Sacco", "Suitucancha", "Yauli"],
                    "Chupaca": ["Chupaca", "Ahuac", "Chongos Bajo", "Huachac", "Huamancaca Chico", "San Juan de Ishmael", "San Juan de Jarpa", "Tres de Diciembre", "Yanacancha"]
                }
            },
            "La Libertad": {
                provincias: {
                    "Trujillo": ["Trujillo", "El Porvenir", "Florencia de Mora", "Huanchaco", "La Esperanza", "Laredo", "Moche", "Poroto", "Salaverry", "Simbal", "Victor Larco Herrera"],
                    "Ascope": ["Ascope", "Chicama", "Chocope", "Magdalena de Cao", "Paiján", "Rázuri", "Santiago de Cao"],
                    "Bolívar": ["Bolívar", "Bambamarca", "Condormarca", "Longotea", "Uchumarca", "Ucuncha"],
                    "Chepén": ["Chepén", "Pacanga", "Pueblo Nuevo"],
                    "Gran Chimú": ["Cascas", "Lucma", "Marmot", "Sayapullo"],
                    "Julcán": ["Julcán", "Calamarca", "Carabamba", "Huaso"],
                    "Otuzco": ["Otuzco", "Agallpampa", "Charat", "Huaranchal", "La Cuesta", "Mache", "Paranday", "Salpo", "Sinsicap", "Usquil"],
                    "Pacasmayo": ["San Pedro de Lloc", "Guadalupe", "Jequetepeque", "Pacasmayo", "San José"],
                    "Pataz": ["Tayabamba", "Buldibuyo", "Chillia", "Huancaspata", "Huaylillas", "Huayo", "Ongón", "Parcoy", "Pías", "Santiago de Challas", "Taurija", "Urcuhuayna", "Urpay"],
                    "Sánchez Carrión": ["Huamachuco", "Chugay", "Cochorco", "Curgos", "Marcabal", "Sanagorán", "Sarin", "Sartimbamba"],
                    "Santiago de Chuco": ["Santiago de Chuco", "Angasmarca", "Cachicadán", "Mollebamba", "Mollepata", "Quiruvilca", "Santa Cruz de Chuca", "Sitabamba"],
                    "Ascope": ["Ascope", "Chicama", "Chocope", "Magdalena de Cao", "Paiján", "Rázuri", "Santiago de Cao"],
                    "Virú": ["Virú", "Chao", "Guadalupito"]
                }
            },
            "Lambayeque": {
                provincias: {
                    "Chiclayo": ["Chiclayo", "Chongoyape", "Eten", "Eten Puerto", "José Leonardo Ortiz", "La Victoria", "Lagunas", "Monsefú", "Nueva Arica", "Oyotún", "Picsi", "Pimentel", "Reque", "Santa Rosa", "Saña", "Cayalti", "Patapo", "Pomalca", "Pucalá", "Tuman"],
                    "Ferreñafe": ["Ferreñafe", "Cañaris", "Incahuasi", "Manuel Antonio Mesones Muro", "Pitipo", "Pueblo Nuevo"],
                    "Lambayeque": ["Lambayeque", "Chope", "Illimo", "Jayanca", "Mochumi", "Morrope", "Motupe", "Olmos", "Pacora", "Salas", "San José", "Tucume"]
                }
            },
            "Lima": {
                provincias: {
                    "Lima": ["Lima", "Ancón", "Ate", "Barranco", "Breña", "Carabayllo", "Chaclacayo", "Chorrillos", "Cieneguilla", "Comas", "El Agustino", "Independencia", "Jesús María", "La Molina", "La Victoria", "Lince", "Los Olivos", "Lurigancho", "Lurín", "Magdalena del Mar", "Miraflores", "Pachacámac", "Pucusana", "Pueblo Libre", "Puente Piedra", "Punta Hermosa", "Punta Negra", "Rímac", "San Bartolo", "San Borja", "San Isidro", "San Juan de Lurigancho", "San Juan de Miraflores", "San Luis", "San Martín de Porres", "San Miguel", "Santa Anita", "Santa María del Mar", "Santa Rosa", "Santiago de Surco", "Surquillo", "Villa El Salvador", "Villa María del Triunfo"],
                    "Barranca": ["Barranca", "Paramonga", "Pativilca", "Supe", "Supe Puerto"],
                    "Cajatambo": ["Cajatambo", "Copa", "Gorgor", "Huancapon", "Manas"],
                    "Canta": ["Canta", "Arahuay", "Huamantanga", "Huaros", "Lachaqui", "San Buenaventura", "Santa Rosa de Quives"],
                    "Cañete": ["San Vicente de Cañete", "Asia", "Calango", "Cerro Azul", "Chilca", "Coayllo", "Imperial", "Lunahuaná", "Mala", "Nuevo Imperial", "Pacarán", "Quilmaná", "San Antonio", "San Luis", "Santa Cruz de Flores", "Zúñiga"],
                    "Huaral": ["Huaral", "Atavillos Alto", "Atavillos Bajo", "Aucallama", "Chancay", "Ihuarí", "Lampián", "Pacaraos", "San Miguel de Acos", "Santa Cruz de Andamarca", "Sumbilca", "Veintisiete de Noviembre"],
                    "Huarochirí": ["Matucana", "Antioquía", "Callahuanca", "Carampoma", "Chicla", "Cuenca", "Huachupampa", "Huanza", "Huarochirí", "Lahuaytambo", "Langa", "Laraos", "Mariatana", "Ricardo Palma", "San Andrés de Tupicocha", "San Antonio", "San Bartolomé", "San Damián", "San Juan de Iris", "San Juan de Tantaranche", "San Lorenzo de Quinti", "San Mateo", "San Mateo de Otao", "San Pedro de Casta", "San Pedro de Huancayre", "Sangallaya", "Santa Cruz de Cocachacra", "Santa Eulalia", "Santiago de Anchucaya", "Santiago de Tuna", "Santo Domingo de los Olleros", "Surco"],
                    "Huaura": ["Huacho", "Ámbar", "Caleta de Carquín", "Checras", "Hualmay", "Huaura", "Leoncio Prado", "Paccho", "Santa Leonor", "Santa María", "Sayan", "Végueta"],
                    "Oyón": ["Oyón", "Andajes", "Caujul", "Cochamarca", "Navan", "Pachangara"],
                    "Yauyos": ["Yauyos", "Alis", "Ayauca", "Ayaviri", "Azángaro", "Cacra", "Carania", "Catahuasi", "Chocos", "Cochas", "Colonia", "Hongos", "Huampara", "Huancaya", "Huangascar", "Huañec", "Laraos", "Lincha", "Madean", "Miraflores", "Omas", "Putinza", "Quinches", "Quinocay", "San Joaquín", "San Pedro de Pilas", "Tanta", "Tauripampa", "Tomas", "Tupe", "Viñac", "Vitis"]
                }
            },
            "Loreto": {
                provincias: {
                    "Maynas": ["Iquitos", "Alto Nanay", "Fernando Lores", "Indiana", "Las Amazonas", "Mazan", "Nauta", "Pebas", "Punchana", "Torres Causana", "Belén", "San Juan Bautista"],
                    "Alto Amazonas": ["Yurimaguas", "Balsapuerto", "Barranca", "Cahuapanas", "Jeberos", "Lagunas", "Santa Cruz", "Teniente César López Rojas", "Pueblo Nuevo", "Pulgar Grande"],
                    "Loreto": ["Nauta", "Parinari", "Tigre", "Trompeteros", "Urarinas"],
                    "Mariscal Ramón Castilla": ["Caballocoha", "Pebas", "Ramon Castilla", "San Pablo", "Yavari", "San Juan de Yanayacu"],
                    "Requena": ["Requena", "Alto Tapiche", "Capelo", "Emilio San Martín", "Maquía", "Puinahua", "Saquena", "Soplin", "Tapiche", "Jenaro Herrera", "Yaquerana"],
                    "Ucayali": ["Contamana", "Inahuaya", "Padre Márquez", "Pampa Hermosa", "Sarayacu", "Vargas Guerra"],
                    "Putumayo": ["San Antonio del Estrecho", "Otorongo", "Yaguas", "Rosa Panduro", "Teniente Manuel Clavero"]
                }
            },
            "Madre de Dios": {
                provincias: {
                    "Tambo": ["Puerto Maldonado", "Laberinto", "Las Piedras"],
                    "Manu": ["Manu", "Fitzcarrald", "Madre de Dios", "Huepetuhe"],
                    "Tahuamanu": ["Iñapari", "Iberia", "Tahuamanu"]
                }
            },
            "Moquegua": {
                provincias: {
                    "Mariscal Nieto": ["Moquegua", "Carumas", "Cuchumbaya", "Samegua", "San Cristóbal", "Torata"],
                    "General Sánchez Cerro": ["Omate", "Chojata", "Coalaque", "Ichuña", "La Capilla", "Lloque", "Matalaque", "Puquina", "Quinistaquillas", "Ubinas", "Yunga"],
                    "Ilo": ["Ilo", "El Algarrobal", "Pacocha"]
                }
            },
            "Pasco": {
                provincias: {
                    "Pasco": ["Pasco", "Chacayan", "Huachón", "Huariaca", "Huayllay", "Ninacaca", "Pallanchacra", "Paucartambo", "San Francisco de Asís de Yarusyacán", "Simón Bolívar", "Ticlacayán", "Tinyahuarco", "Vicco", "Yanacancha"],
                    "Daniel Alcides Carrión": ["Yanahuanca", "Chacayán", "Goyllarisquizga", "Paucar", "San Pedro de Pillao", "Santa Ana de Tusi", "Tapuc", "Vilcabamba"],
                    "Oxapampa": ["Oxapampa", "Chontabamba", "Huancabamba", "Palcazú", "Pozuzo", "Puertos Germán", "Villa Rica"]
                }
            },
            "Piura": {
                provincias: {
                    "Piura": ["Piura", "Castilla", "Catacaos", "Cura Mori", "El Tallán", "La Arena", "La Unión", "Las Lomas", "Tambo Grande"],
                    "Ayabaca": ["Ayabaca", "Frias", "Jililí", "Lagunas", "Montero", "Pacaipampa", "Paimas", "Sapillica", "Sicchez", "Suyo"],
                    "Huancabamba": ["Huancabamba", "Canchaque", "El Carmen de la Frontera", "Huarmaca", "Lalaquiz", "San Miguel de El Faique", "Sondor", "Sondorillo"],
                    "Morropón": ["Chulucanas", "Buenos Aires", "Morropon", "Salitral", "San Juan de Bigote", "Santa Catalina de Mossa", "Santo Domingo", "Yamango"],
                    "Paita": ["Paita", "Amotape", "Arenal", "Colán", "La Huaca", "La Matanza", "Tamgrand", "Vichayal"],
                    "Sullana": ["Sullana", "Bellavista", "Ignacio Escudero", "Lancones", "Marcavelica", "Miguel Checa", "Querecotillo", "Salitral"],
                    "Talara": ["Talara", "El Alto", "La Brea", "Lobitos", "Los Organos", "Mancora", "Pariñas"],
                    "Sechura": ["Sechura", "Bellavista de la Unión", "Bernal", "Cristo Nos Valga", "Vice", "Rinconada Llicuar"]
                }
            },
            "Puno": {
                provincias: {
                    "Puno": ["Puno", "Acora", "Amantani", "Atuncolla", "Capachica", "Chucuito", "Coata", "Huata", "Mañazo", "Paucarcolla", "Pichacani", "Plateria", "San Antonio", "Tiquillaca", "Vilque"],
                    "Azángaro": ["Azángaro", "Achaya", "Arapa", "Asillo", "Caminaca", "Chupa", "José Domingo Choquehuanca", "Muñani", "Potoni", "Saman", "San Anton", "San José", "San Juan de Salinas", "Santiago de Pupuja", "Tirapata"],
                    "Carabaya": ["Macusani", "Ajoyani", "Ayapata", "Coasa", "Corani", "Crucero", "Ituata", "Ollachea", "San Gaban", "Usicayos"],
                    "Chucuito": ["Juli", "Desaguadero", "Huancho", "Kelluyo", "Pisacoma", "Pomata", "Zepita"],
                    "El Collao": ["Ilave", "Capazo", "Pilcuyo", "Santa Rosa", "Conduriri"],
                    "Huancane": ["Huancané", "Cojata", "Huatasani", "Inchupalla", "Pusi", "Rosaspata", "Taraco", "Vilque Chico"],
                    "Lampa": ["Lampa", "Cabanilla", "Calapuja", "Nicasio", "Ocuviri", "Palca", "Paratia", "Pucara", "Santa Lucia", "Vilavila"],
                    "Melgar": ["Ayaviri", "Antauta", "Cupi", "Llalli", "Macari", "Nuñoa", "Orurillo", "Santa Rosa", "Umachiri"],
                    "Moho": ["Moho", "Conima", "Huayrapata", "Tilali"],
                    "San Antonio de Putina": ["Putina", "Ananea", "Pedro Vilca Apaza", "Quilcapuncu", "Sina"],
                    "San Román": ["Juliaca", "Cabanillas", "Caracoto", "San Miguel"],
                    "Sandia": ["Sandia", "Cuyocuyo", "Limbani", "Patambuco", "Phara", "Quiaca", "San Juan del Oro", "Yanahuaya"],
                    "Yunguyo": ["Yunguyo", "Anapia", "Copani", "Cuturapi", "Ollaraya", "Tiniciaca", "Unicachi"]
                }
            },
            "San Martín": {
                provincias: {
                    "Moyobamba": ["Moyobamba", "Calzada", "Habana", "Jepelacio", "Soritor", "Yantaló"],
                    "Bellavista": ["Bellavista", "Alto Biak", "Bajo Biak", "Huallaga", "San Pablo", "San Rafael"],
                    "El Dorado": ["San José de Sisa", "Agua Blanca", "San Martín", "Santa Rosa", "Shatoja"],
                    "Huallaga": ["Saposoa", "Alto Saposoa", "El Eslabón", "Piscoyacu", "Sacanche", "Tingo de Saposoa"],
                    "Lamas": ["Lamas", "Alonso de Alvarado", "Barranquita", "Caynarachi", "Cuñumbuqui", "Pinto Recodo", "Rumisapa", "San Roque de Cumbaza", "Shanao", "Tabalosos", "Zapatero"],
                    "Mariscal Cáceres": ["Juanjuí", "Campanilla", "Huicungo", "Pachiza", "Pajarillo"],
                    "Picota": ["Picota", "Buenos Aires", "Caspisapa", "Pilluana", "Pucacaca", "San Cristóbal", "San Hilarión", "Shamboyacu", "Tingo de Ponasa", "Tres Unidos"],
                    "Rioja": ["Rioja", "Awajún", "Elias Soplin Vargas", "Nueva Cajamarca", "Pardo Miguel", "Posic", "San Fernando", "Yorongos", "Yuracyacu"],
                    "San Martín": ["Tarapoto", "Alberto Leveau", "Cacatachi", "Chazuta", "Chipurana", "El Porvenir", "Huimbayoc", "Juan Guerra", "La Banda de Shilcayo", "Morales", "Papaplaya", "San Antonio", "Sauce", "Shapaja"],
                    "Tocache": ["Tocache", "Nuevo Progreso", "Polvora", "Shunte", "Uchiza"]
                }
            },
            "Tacna": {
                provincias: {
                    "Tacna": ["Tacna", "Alto de la Alianza", "Calana", "Ciudad Nueva", "Inclán", "Pachía", "Palca", "Pocollay", "Sama", "Coronel Gregorio Albarracín Lanchipa"],
                    "Candarave": ["Candarave", "Cairani", "Camilaca", "Curibaya", "Huanuara", "Quilahuani"],
                    "Jorge Basadre": ["Locumba", "Ilabaya", "Ite"],
                    "Tarata": ["Tarata", "Heroes Albarracín", "Estique", "Estique-Pampa", "Sitajara", "Susapaya", "Tarucachi", "Ticaco"]
                }
            },
            "Tumbes": {
                provincias: {
                    "Tumbes": ["Tumbes", "Corrales", "La Cruz"],
                    "Contralmirante Villar": ["Zorritos", "Casitas", "Canoas de Punta Sal"],
                    "Zarumilla": ["Zarumilla", "Aguas Verdes", "Matapalo", "Papayal"]
                }
            },
            "Ucayali": {
                provincias: {
                    "Coronel Portillo": ["Callería", "Campoverde", "Iparía", "Masisea", "Yarinacocha", "Nueva Requena", "Manantay"],
                    "Atalaya": ["Raymondi", "Sepahua", "Tahuanía", "Yurúa"],
                    "Padre Abad": ["Padre Abad", "Irazola", "Curimaná"],
                    "Purús": ["Purús"]
                }
            }
        
        };


	


            // Manejar cambio de departamento
            const departamentoSelect = document.getElementById('departamento');
            const provinciaSelect = document.getElementById('provincia');
            const distritoSelect = document.getElementById('distrito');

            departamentoSelect.addEventListener('change', function() {
                // Limpiar selects
                provinciaSelect.innerHTML = '<option value="">Seleccione una provincia</option>';
                distritoSelect.innerHTML = '<option value="">Seleccione un distrito</option>';

                const departamentoSeleccionado = this.value;
                
                if (departamentoSeleccionado && peruData[departamentoSeleccionado]) {
                    const provincias = peruData[departamentoSeleccionado].provincias;
                    
                    // Agregar opciones de provincias
                    Object.keys(provincias).forEach(provincia => {
                        const option = document.createElement('option');
                        option.value = provincia;
                        option.textContent = provincia;
                        provinciaSelect.appendChild(option);
                    });
                }
            });

            // Manejar cambio de provincia
            provinciaSelect.addEventListener('change', function() {
                // Limpiar select de distritos
                distritoSelect.innerHTML = '<option value="">Seleccione un distrito</option>';

                const departamentoSeleccionado = departamentoSelect.value;
                const provinciaSeleccionada = this.value;
                
                if (departamentoSeleccionado && provinciaSeleccionada && 
                    peruData[departamentoSeleccionado] && 
                    peruData[departamentoSeleccionado].provincias[provinciaSeleccionada]) {
                    
                    const distritos = peruData[departamentoSeleccionado].provincias[provinciaSeleccionada];
                    
                    // Agregar opciones de distritos
                    distritos.forEach(distrito => {
                        const option = document.createElement('option');
                        option.value = distrito;
                        option.textContent = distrito;
                        distritoSelect.appendChild(option);
                    });
                }
            });

            // Si hay valores antiguos, cargarlos
            @if(old('departamento'))
                departamentoSelect.value = "{{ old('departamento') }}";
                departamentoSelect.dispatchEvent(new Event('change'));

                @if(old('provincia'))
                    setTimeout(() => {
                        provinciaSelect.value = "{{ old('provincia') }}";
                        provinciaSelect.dispatchEvent(new Event('change'));

                        @if(old('distrito'))
                            setTimeout(() => {
                                distritoSelect.value = "{{ old('distrito') }}";
                            }, 100);
                        @endif
                    }, 100);
                @endif
            @endif

            // Vista previa de la foto
            document.getElementById('foto_perfil').addEventListener('change', function(e) {
                const file = e.target.files[0];
                const errorElement = document.getElementById('foto_perfil_error');

                if (file) {
                    // Validar tamaño máximo (2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        errorElement.textContent = 'El archivo es demasiado grande. El tamaño máximo permitido es 2MB.';
                        this.classList.add('is-invalid');
                        this.value = '';
                        return;
                    }

                    // Validar tipo de archivo
                    const validTypes = ['image/jpeg', 'image/png'];
                    if (!validTypes.includes(file.type)) {
                        errorElement.textContent = 'Solo se permiten archivos JPG o PNG.';
                        this.classList.add('is-invalid');
                        this.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('fotoPreview').setAttribute('src', event.target.result);
                        document.getElementById('fotoPreview').style.display = 'block';
                        errorElement.textContent = '';
                        e.target.classList.remove('is-invalid');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Activar/desactivar el botón de registro según los términos y condiciones
            document.getElementById('acepto_terminos').addEventListener('change', function() {
                document.getElementById('btnRegistrar').disabled = !this.checked;
            });

            // Validación de DNI (8 dígitos)
            document.getElementById('dni').addEventListener('input', function() {
                const dni = this.value.trim();
                const errorElement = document.getElementById('dni_error');

                if (dni.length !== 8 || !/^\d+$/.test(dni)) {
                    this.classList.add('is-invalid');
                    errorElement.textContent = 'El DNI debe tener exactamente 8 dígitos numéricos.';
                } else {
                    this.classList.remove('is-invalid');
                    errorElement.textContent = '';

                    // Verificar si el DNI ya existe en la base de datos
                    verificarDNIExistente(dni);
                }
            });

            // Función para verificar si el DNI ya existe
            function verificarDNIExistente(dni) {
                const ciclo = document.getElementById('ciclo').value;
                if (!ciclo) return;

                document.getElementById('dni_checking').classList.remove('d-none');

                fetch(`/verificar-dni?dni=${dni}&ciclo=${ciclo}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('dni_checking').classList.add('d-none');

                    if (data.existe) {
                        document.getElementById('dni').classList.add('is-invalid');
                        document.getElementById('dni_error').textContent =
                            'Este DNI ya está registrado en el mismo ciclo. Por favor verifique o seleccione otro ciclo.';
                    }
                })
                .catch(() => {
                    document.getElementById('dni_checking').classList.add('d-none');
                });
            }

            // Validación de números de WhatsApp (9 dígitos)
            const whatsappInputs = ['watsap_propio', 'watsap_apoderado'];
            whatsappInputs.forEach(id => {
                document.getElementById(id).addEventListener('input', function() {
                    const numero = this.value.trim();
                    const errorElement = document.getElementById(`${id}_error`);

                    if (numero.length !== 9 || !/^\d+$/.test(numero)) {
                        this.classList.add('is-invalid');
                        errorElement.textContent = 'El número de WhatsApp debe tener exactamente 9 dígitos numéricos.';
                    } else {
                        this.classList.remove('is-invalid');
                        errorElement.textContent = '';
                    }
                });
            });

            // Validación en tiempo real para campos requeridos
            const requiredFields = document.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                field.addEventListener('blur', function() {
                    validateField(this);
                });
                
                // Validación en tiempo real para campos de texto
                if (field.type === 'text' || field.tagName === 'SELECT' || field.type === 'date' || field.type === 'number') {
                    field.addEventListener('input', function() {
                        validateField(this);
                    });
                }
            });

            function validateField(field) {
                const fieldId = field.id;
                const errorElement = document.getElementById(`${fieldId}_error`);

                // Validación especial para campos específicos
                if (fieldId === 'dni' && field.value.trim().length === 8 && /^\d+$/.test(field.value.trim())) {
                    field.classList.remove('is-invalid');
                    if (errorElement) errorElement.textContent = '';
                    return true;
                }

                if (fieldId === 'watsap_propio' || fieldId === 'watsap_apoderado') {
                    const numero = field.value.trim();
                    if (numero.length === 9 && /^\d+$/.test(numero)) {
                        field.classList.remove('is-invalid');
                        if (errorElement) errorElement.textContent = '';
                        return true;
                    }
                }

                if (fieldId === 'fecha_nacimiento') {
                    const fechaNacimiento = new Date(field.value);
                    const hoy = new Date();
                    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
                    const mes = hoy.getMonth() - fechaNacimiento.getMonth();

                    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
                        edad--;
                    }

                    if (edad >= 15) {
                        field.classList.remove('is-invalid');
                        if (errorElement) errorElement.textContent = '';
                        return true;
                    } else {
                        field.classList.add('is-invalid');
                        if (errorElement) errorElement.textContent = 'El postulante debe tener al menos 15 años.';
                        return false;
                    }
                }

                if (fieldId === 'fecha_pago') {
                    const fechaPago = new Date(field.value);
                    const hoy = new Date();

                    if (fechaPago <= hoy) {
                        field.classList.remove('is-invalid');
                        if (errorElement) errorElement.textContent = '';
                        return true;
                    } else {
                        field.classList.add('is-invalid');
                        if (errorElement) errorElement.textContent = 'La fecha de pago no puede ser posterior a la fecha actual.';
                        return false;
                    }
                }

                // Validación general para campos requeridos
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    if (errorElement) {
                        errorElement.textContent = 'Este campo es obligatorio.';
                    }
                    return false;
                } else {
                    field.classList.remove('is-invalid');
                    if (errorElement) {
                        errorElement.textContent = '';
                    }
                    return true;
                }
            }

            // Validación de fecha de nacimiento
            document.getElementById('fecha_nacimiento').addEventListener('change', function() {
                const fechaNacimiento = new Date(this.value);
                const hoy = new Date();
                let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
                const mes = hoy.getMonth() - fechaNacimiento.getMonth();

                if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
                    edad--;
                }

                const errorElement = document.getElementById('fecha_nacimiento_error');

                if (edad < 15) {
                    this.classList.add('is-invalid');
                    errorElement.textContent = 'El postulante debe tener al menos 15 años.';
                } else {
                    this.classList.remove('is-invalid');
                    errorElement.textContent = '';
                }
            });

            // Validación de fecha de pago
            document.getElementById('fecha_pago').addEventListener('change', function() {
                const fechaPago = new Date(this.value);
                const hoy = new Date();
                const errorElement = document.getElementById('fecha_pago_error');

                if (fechaPago > hoy) {
                    this.classList.add('is-invalid');
                    errorElement.textContent = 'La fecha de pago no puede ser posterior a la fecha actual.';
                } else {
                    this.classList.remove('is-invalid');
                    errorElement.textContent = '';
                }
            });

            // Validación del formulario antes de enviar
            document.getElementById('registrationForm').addEventListener('submit', function(e) {
                let isValid = true;
                let firstInvalidField = null;

                // Validar todos los campos requeridos
                requiredFields.forEach(field => {
                    if (!validateField(field)) {
                        isValid = false;
                        if (!firstInvalidField) {
                            firstInvalidField = field;
                        }
                    }
                });

                // Validaciones específicas
                const dni = document.getElementById('dni').value.trim();
                if (dni.length !== 8 || !/^\d+$/.test(dni)) {
                    isValid = false;
                    document.getElementById('dni').classList.add('is-invalid');
                    document.getElementById('dni_error').textContent = 'El DNI debe tener exactamente 8 dígitos numéricos.';
                    if (!firstInvalidField) {
                        firstInvalidField = document.getElementById('dni');
                    }
                }

                whatsappInputs.forEach(id => {
                    const numero = document.getElementById(id).value.trim();
                    if (numero.length !== 9 || !/^\d+$/.test(numero)) {
                        isValid = false;
                        document.getElementById(id).classList.add('is-invalid');
                        document.getElementById(`${id}_error`).textContent = 'El número de WhatsApp debe tener exactamente 9 dígitos numéricos.';
                        if (!firstInvalidField) {
                            firstInvalidField = document.getElementById(id);
                        }
                    }
                });

                if (!document.getElementById('acepto_terminos').checked) {
                    isValid = false;
                    document.getElementById('acepto_terminos').classList.add('is-invalid');
                    document.getElementById('acepto_terminos_error').textContent = 'Debe aceptar los términos y condiciones.';
                    if (!firstInvalidField) {
                        firstInvalidField = document.getElementById('acepto_terminos');
                    }
                }

                if (!isValid) {
                    e.preventDefault();
                    // Desplazarse al primer error
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstInvalidField.focus();
                    }

                    // Mostrar mensaje general de error
                    const messageContainer = document.getElementById('messageContainer');
                    const errorAlert = document.createElement('div');
                    errorAlert.className = 'alert alert-custom alert-danger';
                    errorAlert.innerHTML = `
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Por favor complete correctamente todos los campos requeridos.</strong>
                    `;
                    messageContainer.prepend(errorAlert);
                    
                    // Eliminar el mensaje después de 5 segundos
                    setTimeout(() => {
                        errorAlert.remove();
                    }, 5000);
                }
            });

            // Validar el ciclo cuando cambia para verificar DNI
            document.getElementById('ciclo').addEventListener('change', function() {
                const dni = document.getElementById('dni').value.trim();
                if (dni.length === 8 && /^\d+$/.test(dni)) {
                    verificarDNIExistente(dni);
                }
            });
        });
    </script>
</body>
</html>