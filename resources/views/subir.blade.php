<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Subir Imagen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #4b001d, #8e0038); /* Degradado vino tinto */
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }
    .card {
      background-color: #2b0011;
      border-radius: 1rem;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
      color: white;
    }
    .btn-primary {
      background-color: #800020;
      border: none;
    }
    .btn-primary:hover {
      background-color: #a0002d;
    }
    .btn-outline-light {
      border-color: white;
      color: white;
    }
    .btn-outline-light:hover {
      background-color: white;
      color: #800020;
    }
    .form-control {
      background-color: #fff;
      color: #000;
    }
  </style>
</head>
<body>

  <div class="card p-5" style="width: 100%; max-width: 500px;">
    <h2 class="text-center mb-4">
      📤 Subir Imagen
    </h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show text-dark" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    @endif

    {{-- Formulario --}}
    <form action="{{ route('imagen.subir') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="imagen" class="form-label">Selecciona una imagen</label>
        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" required>
      </div>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Subir Imagen</button>
        <a href="{{ route('imagen.listar') }}" class="btn btn-outline-light">📷 Ver Imágenes</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
