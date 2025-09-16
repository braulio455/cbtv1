<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificar al Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .notification-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .whatsapp-btn {
            background-color: #25D366;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-top: 20px;
        }
        .whatsapp-btn:hover {
            background-color: #128C7E;
            color: white;
        }
    </style>
</head>
<body>
    <div class="notification-container">
        <h3><i class="bi bi-person-lines-fill"></i> Notificar al Estudiante</h3>
        
        @if(session('success'))
            <div class="alert alert-success mt-4">
                {!! nl2br(session('success')) !!}
            </div>
        @endif

        <p class="mt-4">Por favor envía esta notificación al estudiante con el resultado de su preinscripción:</p>
        
        <a href="{{ $urlWhatsApp }}" class="whatsapp-btn" target="_blank">
            <i class="bi bi-whatsapp me-2"></i> Enviar WhatsApp al Estudiante
        </a>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Listado
            </a>
        </div>
    </div>
</body>
</html>