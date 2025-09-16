<!-- resources/views/auth/verify_reset.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Verificar Restablecimiento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #800000, #b30000);
      font-family: 'Segoe UI', sans-serif;
    }
    .verify-container {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      padding: 2rem;
      max-width: 500px;
      margin: 0 auto;
      animation: fadeIn 1s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
  <div class="verify-container">
    <h3 class="text-center text-danger mb-4">Verificar Restablecimiento</h3>
    
    @include('partials.alerts')

    <form method="POST" action="{{ route('verify.reset.post') }}">
      @csrf
      <div class="form-floating mb-3">
        <input type="number" name="code" class="form-control" id="code" placeholder="Código de 6 dígitos" required>
        <label for="code">Código de 6 dígitos</label>
      </div>
      <div class="d-grid mb-3">
        <button class="btn btn-primary btn-lg" type="submit">Verificar</button>
      </div>
    </form>
    <div class="text-center">
      <a href="{{ route('reset') }}" class="btn btn-link text-danger">Volver a Restablecer</a>
    </div>
  </div>
</body>
</html>