<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #800000, #b30000);
      font-family: 'Segoe UI', sans-serif;
    }

    .register-container {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      animation: fadeIn 1s ease;
      overflow: hidden;
    }

    .circular-img {
      width: 300px;
      height: 300px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid #fff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      margin: 2rem auto;
      display: block;
    }

    .register-form {
      padding: 2rem;
    }

    .form-control:focus {
      border-color: #b30000;
      box-shadow: 0 0 0 0.2rem rgba(179, 0, 0, 0.25);
    }

    .btn-primary {
      background-color: #b30000;
      border-color: #b30000;
    }

    .btn-primary:hover {
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

  <div class="container">
    <div class="row justify-content-center align-items-center register-container">

      <!-- Columna izquierda: Formulario -->
      <div class="col-md-6 register-form">
        <h3 class="text-center text-danger mb-4">Crear Cuenta</h3>

        @include('partials.alerts')

        <form method="POST" action="{{ route('register.post') }}">
          @csrf

          <div class="form-floating mb-3">
            <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombres" value="{{ old('nombres') }}" required>
            <label for="nombres">Nombres</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos" value="{{ old('apellidos') }}" required>
            <label for="apellidos">Apellidos</label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>
            <label for="email">Correo electrónico</label>
          </div>

          <div class="form-floating mb-3 position-relative">
            <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
            <label for="password">Contraseña</label>
            <span class="toggle-password" onclick="togglePassword('password')">👁️</span>
          </div>

          <div class="form-floating mb-3 position-relative">
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmar Contraseña" required>
            <label for="password_confirmation">Confirmar Contraseña</label>
            <span class="toggle-password" onclick="togglePassword('password_confirmation')">👁️</span>
          </div>

          <div class="d-grid mb-3">
            <button class="btn btn-primary btn-lg" type="submit">Registrar</button>
          </div>
        </form>

        <div class="text-center">
          <a href="{{ route('login') }}" class="btn btn-link text-danger">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
      </div>

      <!-- Columna derecha: Imagen -->
      <div class="col-md-6 text-center">
        <img src="{{ asset('imagenes/1749717676_buho.jpg') }}" alt="Imagen de Registro" class="circular-img">
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
