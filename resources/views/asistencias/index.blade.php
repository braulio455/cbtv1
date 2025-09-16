<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Asistencias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-vino: #8B2635;
            --color-vino-claro: #C38B8B;
            --color-dorado: #D4AF37;
            --color-dorado-claro: #F5E6B3;
        }

        body {
            background-color: #f9f3f3;
            color: #333;
        }

        .navbar-custom {
            background-color: var(--color-vino);
            color: white;
        }

        .btn-custom {
            background-color: var(--color-dorado);
            color: var(--color-vino);
            border: none;
            font-weight: 600;
        }

        .btn-custom:hover {
            background-color: var(--color-dorado-claro);
            color: var(--color-vino);
        }

        .card-custom {
            border: 1px solid var(--color-vino-claro);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(139, 38, 53, 0.1);
        }

        .card-header-custom {
            background-color: var(--color-vino);
            color: white;
            border-radius: 10px 10px 0 0 !important;
        }

        .form-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border: 1px solid var(--color-vino-claro);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            table-layout: fixed;
            min-width: max-content;
        }

        .table th, .table td {
            padding: 1rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .presente {
            background-color: #e8f5e9 !important;
        }

        .ausente {
            background-color: #ffebee !important;
        }

        .tardanza {
            background-color: #fff8e1 !important;
        }

        .badge-custom {
            background-color: var(--color-dorado);
            color: var(--color-vino);
        }

        .select-custom:focus {
            border-color: var(--color-dorado);
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        }

        .btn-whatsapp {
            background-color: #25D366;
            color: white;
            border: none;
        }

        .btn-whatsapp:hover {
            background-color: #128C7E;
            color: white;
        }

        .btn-whatsapp:disabled {
            background-color: #cccccc;
            color: #666666;
            opacity: 0.7;
        }

        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .btn-mark-all {
                margin-bottom: 10px;
                width: 100%;
            }

            .form-container {
                padding: 15px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .col-md-6 {
                margin-bottom: 15px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-calendar-check me-2"></i>Control de Asistencias
            </a>
        </div>
    </nav>

    <div class="container py-3">
        <h1 class="mb-4 text-center text-vino"><i class="fas fa-user-check me-2"></i>Registro de Asistencias</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="form-container shadow-sm">
            <form action="{{ route('asistencias.buscar') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="ciclo" class="form-label">Ciclo</label>
                        <select class="form-select select-custom" id="ciclo" name="ciclo" required>
                            <option value="">Seleccionar ciclo</option>
                            <option value="intensivo" {{ old('ciclo', $cicloSeleccionado ?? '') == 'intensivo' ? 'selected' : '' }}>Intensivo</option>
                            <option value="ordinario_I" {{ old('ciclo', $cicloSeleccionado ?? '') == 'ordinario_I' ? 'selected' : '' }}>Ordinario I</option>
                            <option value="ordinario_II" {{ old('ciclo', $cicloSeleccionado ?? '') == 'ordinario_II' ? 'selected' : '' }}>Ordinario II</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control select-custom" id="fecha" name="fecha" value="{{ old('fecha', $fechaSeleccionada ?? date('Y-m-d')) }}" required>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-custom px-4">
                            <i class="fas fa-search me-2"></i>Buscar Estudiantes
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if(isset($estudiantes))
            <div class="card card-custom shadow-sm mt-4">
                <div class="card-header card-header-custom">
                    <h5 class="mb-0">
                        <i class="fas fa-users me-2"></i>Estudiantes - Ciclo:
                        @if($cicloSeleccionado == 'intensivo')
                            Intensivo
                        @elseif($cicloSeleccionado == 'ordinario_I')
                            Ordinario I
                        @else
                            Ordinario II
                        @endif
                        | Fecha: {{ date('d/m/Y', strtotime($fechaSeleccionada)) }}
                    </h5>
                </div>
                <div class="card-body">
                    @if($estudiantes->isEmpty())
                        <div class="alert alert-warning">No se encontraron estudiantes para este ciclo.</div>
                    @else
                        @if($asistenciaRegistrada ?? false)
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>La asistencia para esta fecha ya fue registrada anteriormente.
                            </div>
                        @endif
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-wrap gap-2 mb-2 mb-md-0">
                                <button id="marcarTodosPresente" class="btn btn-success btn-mark-all">
                                    <i class="fas fa-check-circle me-1"></i>Marcar todos Presente
                                </button>
                                <button id="marcarTodosAusente" class="btn btn-danger btn-mark-all">
                                    <i class="fas fa-times-circle me-1"></i>Marcar todos Ausente
                                </button>
                                <button id="marcarTodosTardanza" class="btn btn-warning btn-mark-all">
                                    <i class="fas fa-clock me-1"></i>Marcar todos Tardanza
                                </button>
                            </div>
                            <span class="badge badge-custom rounded-pill p-2 mt-2 mt-md-0">
                                <i class="fas fa-user-graduate me-1"></i>Total: {{ $estudiantes->count() }} estudiantes
                            </span>
                        </div>
                        <form id="formAsistencia" action="{{ route('asistencias.guardar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="ciclo" value="{{ $cicloSeleccionado }}">
                            <input type="hidden" name="fecha" value="{{ $fechaSeleccionada }}">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 3%;">#</th>
                                            <th style="width: 8%;">DNI</th>
                                            <th style="width: 12%;">Apellido Paterno</th>
                                            <th style="width: 12%;">Apellido Materno</th>
                                            <th style="width: 12%;">Nombres</th>
                                            <th style="width: 15%;">Programa</th>
                                            <th style="width: 13%;">WhatsApp Apoderado</th>
                                            <th style="width: 10%;">Asistencia</th>
                                            <th style="width: 15%;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($estudiantes as $index => $estudiante)
                                            @php
                                                $asistencia = $asistenciasRegistradas[$estudiante->dni] ?? null;
                                                $estadoActual = $asistencia ? $asistencia->estado : 'P';
                                                $tieneWhatsApp = !empty($estudiante->watsap_apoderado);
                                            @endphp
                                            <tr class="@if($estadoActual == 'P') presente @elseif($estadoActual == 'A') ausente @else tardanza @endif">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $estudiante->dni }}</td>
                                                <td>{{ $estudiante->apellido_paterno }}</td>
                                                <td>{{ $estudiante->apellido_materno }}</td>
                                                <td>{{ $estudiante->nombres }}</td>
                                                <td>{{ $estudiante->programa_estudios }}</td>
                                                <td>
                                                    @if($tieneWhatsApp)
                                                        <span class="badge bg-success"><i class="fab fa-whatsapp me-1"></i> {{ $estudiante->watsap_apoderado }}</span>
                                                    @else
                                                        <span class="badge bg-secondary"><i class="fas fa-phone-slash me-1"></i> Sin número</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <select name="estudiantes[{{ $index }}][asistencia]" class="form-select form-select-sm">
                                                        <option value="P" @if($estadoActual == 'P') selected @endif>Presente (P)</option>
                                                        <option value="A" @if($estadoActual == 'A') selected @endif>Ausente (A)</option>
                                                        <option value="T" @if($estadoActual == 'T') selected @endif>Tardanza (T)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="action-buttons">
                                                        <input type="hidden" name="estudiantes[{{ $index }}][dni]" value="{{ $estudiante->dni }}">
                                                        <input type="hidden" name="estudiantes[{{ $index }}][apellido_paterno]" value="{{ $estudiante->apellido_paterno }}">
                                                        <input type="hidden" name="estudiantes[{{ $index }}][apellido_materno]" value="{{ $estudiante->apellido_materno }}">
                                                        <input type="hidden" name="estudiantes[{{ $index }}][nombres]" value="{{ $estudiante->nombres }}">
                                                        <input type="hidden" name="estudiantes[{{ $index }}][programa_estudios]" value="{{ $estudiante->programa_estudios }}">
                                                        <button type="button" class="btn btn-sm btn-primary actualizar-asistencia" data-dni="{{ $estudiante->dni }}" data-fecha="{{ $fechaSeleccionada }}">
                                                            <i class="fas fa-sync-alt me-1"></i> Actualizar
                                                        </button>
                                                        @if(in_array($estadoActual, ['A', 'T']) && $tieneWhatsApp)
                                                            @php
                                                                $fechaFormateada = date('d/m/Y', strtotime($fechaSeleccionada));
                                                                $tipoMensaje = $estadoActual == 'A' ? 'ausente' : 'con tardanza';
                                                                $mensaje = "Estimado apoderado de {$estudiante->nombres} {$estudiante->apellido_paterno}, le informamos que su hijo(a) estuvo {$tipoMensaje} el día {$fechaFormateada}. Por favor, justifique esta inasistencia. Gracias.";
                                                                $mensajeCodificado = urlencode($mensaje);
                                                                $numeroApoderado = $estudiante->watsap_apoderado;
                                                            @endphp
                                                            <a href="https://wa.me/{{ $numeroApoderado }}?text={{ $mensajeCodificado }}" class="btn btn-sm btn-whatsapp" target="_blank">
                                                                <i class="fab fa-whatsapp me-1"></i> Enviar
                                                            </a>
                                                        @else
                                                            <button type="button" class="btn btn-sm btn-whatsapp" disabled>
                                                                <i class="fab fa-whatsapp me-1"></i> Enviar
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-custom btn-lg px-5" @if($asistenciaRegistrada ?? false) disabled @endif>
                                    <i class="fas fa-save me-2"></i> Guardar Asistencia General
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <footer class="mt-5 py-3 text-center text-white" style="background-color: var(--color-vino);">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Sistema de Control de Asistencias</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Manejo de marcar todos los estudiantes
            $('#marcarTodosPresente').click(function(e) {
                e.preventDefault();
                $('select[name^="estudiantes"]').val('P');
                $('tbody tr').removeClass('ausente tardanza').addClass('presente');
                $('.btn-whatsapp').prop('disabled', true).addClass('disabled');
            });

            $('#marcarTodosAusente').click(function(e) {
                e.preventDefault();
                $('select[name^="estudiantes"]').val('A');
                $('tbody tr').removeClass('presente tardanza').addClass('ausente');
                $('.btn-whatsapp').each(function() {
                    const tieneWhatsApp = $(this).closest('tr').find('.badge.bg-success').length > 0;
                    $(this).prop('disabled', !tieneWhatsApp).toggleClass('disabled', !tieneWhatsApp);
                });
            });

            $('#marcarTodosTardanza').click(function(e) {
                e.preventDefault();
                $('select[name^="estudiantes"]').val('T');
                $('tbody tr').removeClass('presente ausente').addClass('tardanza');
                $('.btn-whatsapp').each(function() {
                    const tieneWhatsApp = $(this).closest('tr').find('.badge.bg-success').length > 0;
                    $(this).prop('disabled', !tieneWhatsApp).toggleClass('disabled', !tieneWhatsApp);
                });
            });

            // Cambiar clase de fila según selección
            $('select[name^="estudiantes"]').change(function() {
                const valor = $(this).val();
                const fila = $(this).closest('tr');
                const btnWhatsApp = fila.find('.btn-whatsapp');
                fila.removeClass('presente ausente tardanza');
                if (valor === 'P') {
                    fila.addClass('presente');
                    btnWhatsApp.prop('disabled', true).addClass('disabled');
                } else if (valor === 'A') {
                    fila.addClass('ausente');
                    const tieneWhatsApp = fila.find('.badge.bg-success').length > 0;
                    btnWhatsApp.prop('disabled', !tieneWhatsApp).toggleClass('disabled', !tieneWhatsApp);
                } else {
                    fila.addClass('tardanza');
                    const tieneWhatsApp = fila.find('.badge.bg-success').length > 0;
                    btnWhatsApp.prop('disabled', !tieneWhatsApp).toggleClass('disabled', !tieneWhatsApp);
                }
            });

            // Actualización individual de asistencia
            $('.actualizar-asistencia').click(function() {
                const dni = $(this).data('dni');
                const fecha = $(this).data('fecha');
                const estado = $(this).closest('tr').find('select[name^="estudiantes"]').val();
                const fila = $(this).closest('tr');
                const boton = $(this);
                boton.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i> Actualizando...');

                $.ajax({
                    url: '{{ route("asistencias.actualizar") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        dni: dni,
                        fecha: fecha,
                        estado: estado
                    },
                    success: function(response) {
                        if(response.success) {
                            fila.removeClass('presente ausente tardanza');
                            if (estado === 'P') {
                                fila.addClass('presente');
                                fila.find('.btn-whatsapp').prop('disabled', true).addClass('disabled');
                            } else if (estado === 'A') {
                                fila.addClass('ausente');
                                const tieneWhatsApp = fila.find('.badge.bg-success').length > 0;
                                fila.find('.btn-whatsapp').prop('disabled', !tieneWhatsApp).toggleClass('disabled', !tieneWhatsApp);
                            } else {
                                fila.addClass('tardanza');
                                const tieneWhatsApp = fila.find('.badge.bg-success').length > 0;
                                fila.find('.btn-whatsapp').prop('disabled', !tieneWhatsApp).toggleClass('disabled', !tieneWhatsApp);
                            }
                            Swal.fire({
                                icon: 'success',
                                title: '¡Actualizado!',
                                text: response.message,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {
                            throw new Error(response.message);
                        }
                    },
                    error: function(xhr) {
                        let message = xhr.responseJSON?.message || 'Ocurrió un error al actualizar';
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: message,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    },
                    complete: function() {
                        boton.prop('disabled', false).html('<i class="fas fa-sync-alt me-1"></i> Actualizar');
                    }
                });
            });

            // Confirmación antes de guardar
            $('#formAsistencia').submit(function(e) {
                e.preventDefault();
                const estudiantesAusentes = $('select[name^="estudiantes"]').filter(function() {
                    return $(this).val() === 'A' || $(this).val() === 'T';
                }).length;
                let mensajeConfirmacion = '¿Estás seguro de guardar los registros de asistencia?';
                if (estudiantesAusentes > 0) {
                    mensajeConfirmacion += `<br><br>Hay ${estudiantesAusentes} estudiantes con inasistencia (ausencia o tardanza).`;
                    mensajeConfirmacion += '<br>Podrás notificar a los apoderados después de guardar.';
                }
                Swal.fire({
                    title: '¿Guardar asistencias?',
                    html: mensajeConfirmacion,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#D4AF37',
                    cancelButtonColor: '#8B2635',
                    confirmButtonText: 'Sí, guardar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const submitBtn = $(this).find('button[type="submit"]');
                        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Guardando...');
                        this.submit();
                    }
                });
            });

            // Enviar mensajes masivos si hay estudiantes con inasistencia
            @if(session('estudiantes_con_inasistencia'))
                Swal.fire({
                    title: 'Inasistencias registradas',
                    html: `Se registraron {{ count(session('estudiantes_con_inasistencia')) }} inasistencias.<br><br>
                           Puede notificar a los apoderados usando los botones <i class="fab fa-whatsapp text-success"></i> Enviar en cada registro.`,
                    icon: 'info',
                    confirmButtonColor: '#25D366',
                    confirmButtonText: 'Entendido'
                });
            @endif
        });
    </script>
</body>
</html>
