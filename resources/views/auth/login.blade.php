<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #800000, #b30000);
      font-family: 'Segoe UI', sans-serif;
    }

    .login-container {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      overflow: hidden;
      animation: fadeIn 1s ease;
    }

    .login-img {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      background-color: #f8f9fa;
    }

    .login-img img {
      width: 100%;
      max-width: 500px;
      height: auto;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }

    .login-form {
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

    @media (max-width: 768px) {
      .login-img {
        display: none;
      }
    }
  </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

  <div class="row login-container w-75">
    
    <!-- Imagen circular -->
    <div class="col-md-6 login-img">
      <img src="{{ asset('imagenes/1749717676_buho.jpg') }}" alt="Imagen de inicio de sesión">
    </div>

    <!-- Formulario -->
    <div class="col-md-6 login-form">
      <h3 class="text-center text-danger mb-4">Iniciar Sesión</h3>
      
      @include('partials.alerts')

      <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control" id="email" placeholder="Correo" required>
          <label for="email">Correo electrónico</label>
        </div>

        <div class="form-floating mb-3 position-relative">
          <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
          <label for="password">Contraseña</label>
          <span class="toggle-password" onclick="togglePassword()">👁️</span>
        </div>

        <div class="d-grid mb-3">
          <button class="btn btn-primary btn-lg" type="submit">Ingresar</button>
        </div>
      </form>

      <div class="text-center">
        <a href="{{ route('register') }}" class="btn btn-link text-danger">¿No tienes cuenta? Regístrate</a><br>
        <a href="{{ route('reset') }}" class="btn btn-link text-danger">¿Olvidaste tu contraseña?</a>
      </div>
      <div class="text-center mt-3">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary">← Volver al inicio</a>
      </div>
    </div>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);
    }

    
  </script>

</body>
</html>
