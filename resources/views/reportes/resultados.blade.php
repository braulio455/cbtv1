<!DOCTYPE html>
<html lang="es">
<head>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control, .btn {
            background-color: #8B0000;
            color: #FFD700;
            border: 1px solid #8B0000;
        }
        .btn-primary {
            background-color: #8B0000;
            border-color: #8B0000;
        }
        .btn-primary:hover {
            background-color: #6E0000;
            border-color: #6E0000;
        }
        .btn-secondary {
            background-color: #FFD700;
            color: #8B0000;
            border-color: #FFD700;
        }
        .btn-secondary:hover {
            background-color: #FFC000;
            border-color: #FFC000;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Resultados</h2>
        <p>Fecha actual del sistema: {{ $fechaActual }}</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    @if($tipo == 'inscripciones')
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombres</th>
                        <th>DNI</th>
                        <th>Fecha Nacimiento</th>
                        <th>Sexo</th>
                        <th>Foto Perfil</th>
                        <th>WhatsApp Propio</th>
                        <th>WhatsApp Apoderado</th>
                        <th>Parentesco</th>
                        <th>Programa Estudios</th>
                        <th>Colegio Procedencia</th>
                        <th>Ciclo</th>
                        <th>Departamento</th>
                        <th>Provincia</th>
                        <th>Distrito</th>
                        <th>Número Recibo</th>
                        <th>Fecha Pago</th>
                        <th>Monto Pagado</th>
                        <th>Estado Pago</th>
                        <th>¿Cómo se enteró?</th>
                    @elseif($tipo == 'asistencias')
                        <th>DNI</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombres</th>
                        <th>Ciclo</th>
                        <th>Programa</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    @elseif($tipo == 'docentes')
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Especialidad</th>
                        <th>Correo Electrónico</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $dato)
                <tr>
                    @if($tipo == 'inscripciones')
                        <td>{{ $dato->apellido_paterno }}</td>
                        <td>{{ $dato->apellido_materno }}</td>
                        <td>{{ $dato->nombres }}</td>
                        <td>{{ $dato->dni }}</td>
                        <td>{{ $dato->fecha_nacimiento }}</td>
                        <td>{{ $dato->sexo }}</td>
                        <td>{{ $dato->foto_perfil }}</td>
                        <td>{{ $dato->watsap_propio }}</td>
                        <td>{{ $dato->watsap_apoderado }}</td>
                        <td>{{ $dato->parentesco }}</td>
                        <td>{{ $dato->programa_estudios }}</td>
                        <td>{{ $dato->colegio_procedencia }}</td>
                        <td>{{ $dato->ciclo }}</td>
                        <td>{{ $dato->departamento }}</td>
                        <td>{{ $dato->provincia }}</td>
                        <td>{{ $dato->distrito }}</td>
                        <td>{{ $dato->numero_recibo }}</td>
                        <td>{{ $dato->fecha_pago }}</td>
                        <td>{{ $dato->monto_pagado }}</td>
                        <td>{{ $dato->estado_pago }}</td>
                        <td>{{ $dato->como_se_entero }}</td>
                    @elseif($tipo == 'asistencias')
                        <td>{{ $dato->dni }}</td>
                        <td>{{ $dato->apellido_paterno }}</td>
                        <td>{{ $dato->apellido_materno }}</td>
                        <td>{{ $dato->nombres }}</td>
                        <td>{{ $dato->ciclo }}</td>
                        <td>{{ $dato->programa }}</td>
                        <td>{{ $dato->fecha }}</td>
                        <td>{{ $dato->estado }}</td>
                    @elseif($tipo == 'docentes')
                        <td>{{ $dato->nombres }}</td>
                        <td>{{ $dato->apellidos }}</td>
                        <td>{{ $dato->dni }}</td>
                        <td>{{ $dato->telefono }}</td>
                        <td>{{ $dato->direccion }}</td>
                        <td>{{ $dato->especialidad }}</td>
                        <td>{{ $dato->correo_electronico }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('reportes.pdf', request()->query()) }}" class="btn btn-secondary">Generar PDF</a>
        <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Regresar a Búsqueda</a>
    </div>
</body>
</html>