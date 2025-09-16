<!-- resources/views/emails/verification_code.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Código de Verificación</title>
</head>
<body>
    <h2>Hola {{ $name }},</h2>
    <p>Tu código de verificación es: <strong>{{ $code }}</strong></p>
    <p>Este código expirará en 5 minutos.</p>
    <p>Si no solicitaste este código, ignora este mensaje.</p>
    <p>Gracias,<br>El Equipo de C.B.T.</p>

</body>
</html>