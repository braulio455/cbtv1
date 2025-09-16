<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Preinscripción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4C1B1B;
            --secondary-color: #FFD700;
            --error-color: #dc3545;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-form {
            background-color: white;
            color: var(--primary-color);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin: 2rem auto;
            max-width: 1200px;
            border: 2px solid var(--secondary-color);
        }

        .form-title {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 1rem;
            color: var(--primary-color);
        }

        .form-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--secondary-color);
        }

        .form-control, .form-select {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            background-color: white;
            color: var(--primary-color);
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 215, 0, 0.25);
        }

        .form-label {
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .btn-submit {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            border: none;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: all 0.3s;
            width: 100%;
            font-size: 1.1rem;
        }

        .btn-submit:hover {
            background-color: #e6c200;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(255, 215, 0, 0.3);
        }

        .btn-whatsapp {
            background-color: #25D366;
            color: white;
            font-weight: 600;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s;
            margin-top: 1rem;
        }

        .btn-whatsapp:hover {
            background-color: #128C7E;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(37, 211, 102, 0.3);
        }

        .form-section {
            margin-bottom: 2rem;
            padding: 1.5rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            border-left: 4px solid var(--secondary-color);
        }

        .section-title {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 0.75rem;
            font-size: 1.5rem;
            color: var(--secondary-color);
        }

        .invalid-feedback {
            color: var(--error-color);
            font-weight: 500;
        }

        .required-field:after {
            content: " *";
            color: var(--error-color);
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-upload-btn {
            border: 2px dashed var(--secondary-color);
            color: var(--primary-color);
            background-color: transparent;
            padding: 1rem;
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-upload-btn:hover {
            background-color: rgba(255, 215, 0, 0.1);
        }

        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-name {
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: var(--primary-color);
        }

        .help-text {
            font-size: 0.85rem;
            color: var(--primary-color);
            margin-top: 0.25rem;
        }

        @media (max-width: 768px) {
            .container-form {
                padding: 1.5rem;
            }

            .form-section {
                padding: 1rem;
            }
        }

        .alert-success {
            background-color: rgba(25, 135, 84, 0.2);
            border-left: 4px solid var(--bs-success);
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- El contenido del formulario sigue igual -->
    <div class="container-form">
        <h2 class="form-title"><i class="bi bi-file-earmark-person"></i> Formulario de Preinscripción</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Por favor corrige los siguientes errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>
                {!! nl2br(session('success')) !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('preinscripciones.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-section">
                <h4 class="section-title"><i class="bi bi-person-vcard"></i> Datos Personales</h4>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="apellido_paterno" class="form-label required-field">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"
                               value="{{ old('apellido_paterno') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="apellido_materno" class="form-label required-field">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"
                               value="{{ old('apellido_materno') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nombres" class="form-label required-field">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres"
                               value="{{ old('nombres') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="dni" class="form-label required-field">DNI (8 dígitos)</label>
                        <input type="text" class="form-control" id="dni" name="dni"
                               value="{{ old('dni') }}" pattern="\d{8}" title="Ingrese 8 dígitos numéricos" required>
                        <div class="help-text">Ejemplo: 87654321</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fecha_nacimiento" class="form-label required-field">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                               value="{{ old('fecha_nacimiento') }}" max="{{ date('Y-m-d', strtotime('-15 years')) }}" required>
                        <div class="help-text">Debes tener al menos 15 años</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="sexo" class="form-label required-field">Sexo</label>
                        <select class="form-select" id="sexo" name="sexo" required>
                            <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="femenino" {{ old('sexo') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="foto_perfil" class="form-label required-field">Foto de Perfil</label>
                        <div class="file-upload">
                            <label class="file-upload-btn">
                                <i class="bi bi-cloud-arrow-up"></i> Seleccionar archivo
                                <input type="file" class="file-upload-input" id="foto_perfil" name="foto_perfil"
                                       accept="image/jpeg,image/png,image/jpg" required>
                            </label>
                            <div id="file-name" class="file-name">No se ha seleccionado ningún archivo</div>
                        </div>
                        <div class="help-text">Formatos aceptados: JPG, PNG (Máx. 2MB)</div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h4 class="section-title"><i class="bi bi-telephone"></i> Datos de Contacto</h4>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="watsap_propio" class="form-label required-field">WhatsApp Propio (9 dígitos)</label>
                        <input type="text" class="form-control" id="watsap_propio" name="watsap_propio"
                               value="{{ old('watsap_propio') }}" pattern="\d{9}" title="Ingrese 9 dígitos numéricos" required>
                        <div class="help-text">Ejemplo: 987654321</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="watsap_apoderado" class="form-label required-field">WhatsApp Apoderado (9 dígitos)</label>
                        <input type="text" class="form-control" id="watsap_apoderado" name="watsap_apoderado"
                               value="{{ old('watsap_apoderado') }}" pattern="\d{9}" title="Ingrese 9 dígitos numéricos" required>
                        <div class="help-text">Ejemplo: 987654321</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="parentesco" class="form-label required-field">Parentesco con Apoderado</label>
                        <input type="text" class="form-control" id="parentesco" name="parentesco"
                               value="{{ old('parentesco') }}" required>
                        <div class="help-text">Ejemplo: Padre, Madre, Tío, etc.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="departamento" class="form-label required-field">Departamento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento"
                               value="{{ old('departamento') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="provincia" class="form-label required-field">Provincia</label>
                        <input type="text" class="form-control" id="provincia" name="provincia"
                               value="{{ old('provincia') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="distrito" class="form-label required-field">Distrito</label>
                        <input type="text" class="form-control" id="distrito" name="distrito"
                               value="{{ old('distrito') }}" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h4 class="section-title"><i class="bi bi-book"></i> Información Académica</h4>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="programa_estudios" class="form-label required-field">Programa de Estudios</label>
                        <select class="form-select" id="programa_estudios" name="programa_estudios" required>
                            @foreach($programas as $programa)
                                <option value="{{ $programa->nombre }}" {{ old('programa_estudios') == $programa->nombre ? 'selected' : '' }}>
                                    {{ $programa->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="colegio_procedencia" class="form-label required-field">Colegio de Procedencia</label>
                        <input type="text" class="form-control" id="colegio_procedencia" name="colegio_procedencia"
                               value="{{ old('colegio_procedencia') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="ciclo" class="form-label required-field">Ciclo</label>
                        <select class="form-select" id="ciclo" name="ciclo" required>
                            <option value="intensivo" {{ old('ciclo') == 'intensivo' ? 'selected' : '' }}>Intensivo</option>
                            <option value="ordinario_I" {{ old('ciclo') == 'ordinario_I' ? 'selected' : '' }}>Ordinario I</option>
                            <option value="ordinario_II" {{ old('ciclo') == 'ordinario_II' ? 'selected' : '' }}>Ordinario II</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="como_se_entero" class="form-label required-field">¿Cómo se enteró de nosotros?</label>
                        <select class="form-select" id="como_se_entero" name="como_se_entero" required>
                            <option value="amigos_familiares" {{ old('como_se_entero') == 'amigos_familiares' ? 'selected' : '' }}>Amigos/Familiares</option>
                            <option value="redes_sociales" {{ old('como_se_entero') == 'redes_sociales' ? 'selected' : '' }}>Redes Sociales</option>
                            <option value="radio_tv" {{ old('como_se_entero') == 'radio_tv' ? 'selected' : '' }}>Radio/TV</option>
                            <option value="volantes" {{ old('como_se_entero') == 'volantes' ? 'selected' : '' }}>Volantes</option>
                            <option value="ferias" {{ old('como_se_entero') == 'ferias' ? 'selected' : '' }}>Ferias</option>
                            <option value="otro" {{ old('como_se_entero') == 'otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h4 class="section-title"><i class="bi bi-cash-coin"></i> Información de Pago</h4>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="numero_recibo" class="form-label required-field">Número de Recibo</label>
                        <input type="text" class="form-control" id="numero_recibo" name="numero_recibo"
                               value="{{ old('numero_recibo') }}" required>
                        <div class="help-text">Número completo del recibo de pago</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fecha_pago" class="form-label required-field">Fecha de Pago</label>
                        <input type="date" class="form-control" id="fecha_pago" name="fecha_pago"
                               value="{{ old('fecha_pago', date('Y-m-d')) }}" max="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="monto_pagado" class="form-label required-field">Monto Pagado (S/)</label>
                        <input type="number" step="0.01" class="form-control" id="monto_pagado" name="monto_pagado"
                               value="{{ old('monto_pagado') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="estado_pago" class="form-label required-field">Estado de Pago</label>
                        <select class="form-select" id="estado_pago" name="estado_pago" required>
                            <option value="pago_completado" {{ old('estado_pago') == 'pago_completado' ? 'selected' : '' }}>Pago Completado</option>
                            <option value="pago_pendiente" {{ old('estado_pago') == 'pago_pendiente' ? 'selected' : '' }}>Pago Pendiente</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-submit">
                    <i class="bi bi-send-check"></i> Enviar Preinscripción
                </button>

                <div class="text-center mt-3">
                    <p class="text-muted">¿Tienes dudas sobre el proceso?</p>
                    <a href="https://wa.me/51910554546" class="btn-whatsapp" target="_blank">
                        <i class="bi bi-whatsapp"></i> Contactar al Administrador
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mostrar nombre del archivo seleccionado
        document.getElementById('foto_perfil').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No se ha seleccionado ningún archivo';
            document.getElementById('file-name').textContent = fileName;
        });

        // Validar edad mínima
        document.getElementById('fecha_nacimiento').addEventListener('change', function() {
            const birthDate = new Date(this.value);
            const minDate = new Date();
            minDate.setFullYear(minDate.getFullYear() - 15);

            if (birthDate > minDate) {
                alert('Debes tener al menos 15 años para registrarte.');
                this.value = '';
            }
        });

        // Validar DNI (8 dígitos)
        document.getElementById('dni').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 8);
        });

        // Validar WhatsApp (9 dígitos)
        document.getElementById('watsap_propio').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 9);
        });

        document.getElementById('watsap_apoderado').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 9);
        });
    </script>
</body>
</html>
