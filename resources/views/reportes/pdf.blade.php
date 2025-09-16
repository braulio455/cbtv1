<!DOCTYPE html>
<html>
<head>
    <title>Reporte para Impresión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        @media print {
            body {
                margin: 0;
                padding: 20px;
            }
            table {
                page-break-inside: auto;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
</head>
<body>
    <h1>Reporte de {{ ucfirst($tipo) }}</h1>
    <p>Fecha actual del sistema: {{ $fechaActual }}</p>
    <table>
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
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
