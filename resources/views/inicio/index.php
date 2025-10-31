<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CBT Túpac Amaru - Bienvenida</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #1abc9c; /* turquesa */
      --secondary-color: #34495e; /* gris oscuro */
    }

    body {
      font-family: 'Segoe UI', sans-serif;
    }

    .hero {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1601758123927-0b5d48e92f7f') center/cover no-repeat;
      color: white;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 30px;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border: none;
    }

    .features .card {
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .features .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    footer {
      background-color: var(--secondary-color);
      color: white;
      padding: 20px 0;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--secondary-color);">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">CBT Túpac Amaru</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
          <li class="nav-item"><a class="nav-link" href="#courses">Cursos</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Bienvenidos al CBT Túpac Amaru</h1>
      <p>Formando profesionales capacitados para el futuro</p>
      <a href="#courses" class="btn btn-primary btn-lg">Explora nuestros cursos</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-5">
    <div class="container text-center">
      <h2 class="mb-4">Sobre Nosotros</h2>
      <p>El Centro de Bachillerato Tecnológico Túpac Amaru ofrece educación de calidad en diversas áreas técnicas y profesionales, preparando a los estudiantes para afrontar los desafíos del mundo laboral.</p>
    </div>
  </section>

  <!-- Features / Courses -->
  <section id="courses" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5">Nuestros Cursos</h2>
      <div class="row g-4 features">
        <div class="col-md-4">
          <div class="card h-100 text-center p-3">
            <i class="bi bi-laptop display-4 text-primary mb-3"></i>
            <h5 class="card-title">Programación</h5>
            <p class="card-text">Aprende a desarrollar aplicaciones web y móviles con las últimas tecnologías.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 text-center p-3">
            <i class="bi bi-bar-chart-line display-4 text-primary mb-3"></i>
            <h5 class="card-title">Gestión Empresarial</h5>
            <p class="card-text">Capacitación en administración, finanzas y marketing digital para empresas modernas.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 text-center p-3">
            <i class="bi bi-hammer display-4 text-primary mb-3"></i>
            <h5 class="card-title">Técnico Industrial</h5>
            <p class="card-text">Formación práctica en áreas industriales y técnicas para el sector productivo.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-5">
    <div class="container text-center">
      <h2 class="mb-4">Contacto</h2>
      <p>Comunícate con nosotros para más información sobre los cursos y la inscripción.</p>
      <p>Email: info@cbttupacamaru.edu.pe | Teléfono: +51 84 123456</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p>&copy; 2025 CBT Túpac Amaru. Todos los derechos reservados.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
