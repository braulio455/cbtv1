
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

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
        <h2 class="mb-4">Seleccione el tipo de reporte</h2>
        <form action="{{ route('reportes.filtrar') }}" method="GET">
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="inscripciones">Inscripciones</option>
                    <option value="asistencias">Asistencias</option>
                    <option value="docentes">Docentes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ciclo">Ciclo:</label>
                <select name="ciclo" id="ciclo" class="form-control">
                    <option value="">Todos</option>
                    <option value="intensivo">Intensivo</option>
                    <option value="ordinarioI">Ordinario I</option>
                    <option value="ordinarioII">Ordinario II</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
    </div>
</body>
</html>