<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Restablecer Contraseña</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #800000, #b30000);
      font-family: 'Segoe UI', sans-serif;
    }

    .reset-container {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      overflow: hidden;
      animation: fadeIn 1s ease;
    }

    .reset-img {
      background: url('https://cdn-icons-png.flaticon.com/512/6195/6195700.png') no-repeat center;
      background-size: 65%;
    }

    .reset-form {
      padding: 2rem;
    }

    .form-control:focus {
      border-color: #b30000;
      box-shadow: 0 0 0 0.2rem rgba(179, 0, 0, 0.25);
    }

    .btn-warning {
      background-color: #b30000;
      border-color: #b30000;
      color: white;
    }

    .btn-warning:hover {
      background-color: #800000;
    }

    .form-floating > label {
      color: #6c757d;
    }

    .toggle-password {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #b30000;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

  <div class="row reset-container w-75">
    <div class="col-md-6 reset-img d-none d-md-block"></div>

    <div class="col-md-6 reset-form">
      <h3 class="text-center text-danger mb-4">Restablecer Contraseña</h3>

      @include('partials.alerts')

      <form method="POST" action="{{ route('reset.post') }}">
        @csrf

        <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control" id="email" placeholder="Correo registrado" value="{{ old('email') }}" required>
          <label for="email">Correo registrado</label>
        </div>

        <div class="form-floating mb-3 position-relative">
          <input type="password" name="password" class="form-control" id="password" placeholder="Nueva contraseña" required>
          <label for="password">Nueva contraseña</label>
          <span class="toggle-password" onclick="togglePassword('password')">👁️</span>
        </div>

        <div class="form-floating mb-3 position-relative">
          <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmar contraseña" required>
          <label for="password_confirmation">Confirmar nueva contraseña</label>
          <span class="toggle-password" onclick="togglePassword('password_confirmation')">👁️</span>
        </div>

        <div class="d-grid mb-3">
          <button class="btn btn-warning btn-lg" type="submit">Restablecer</button>
        </div>
      </form>

      <div class="text-center">
        <a href="{{ route('login') }}" class="btn btn-link text-danger">Volver al Login</a>
      </div>
    </div>
  </div>

  <script>
    function togglePassword(id) {
      const input = document.getElementById(id);
      const type = input.getAttribute("type") === "password" ? "text" : "password";
      input.setAttribute("type", type);
    }
  </script>

</body>
</html>
