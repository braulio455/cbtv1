<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="CBT - Ciclo Básico Tecnológico. Inscripciones abiertas para el intensivo 2025. Excelencia educativa para tu futuro profesional.">
  <title>CBT | Ciclo Básico Tecnológico - Intensivo 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #911b27;
      --primary-light: #b12c3a;
      --secondary-color: #ffc107;
      --secondary-light: #ffdb70;
      --accent-color: #28a745;
      --dark-color: #2d2d2d;
      --light-color: #f8f9fa;
      --gray-color: #6c757d;
      --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
      --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.12);
      --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
      --transition: all 0.3s ease-in-out;
      --border-radius: 12px;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Roboto', sans-serif;
      background-color: var(--light-color);
      color: var(--dark-color);
      line-height: 1.6;
      overflow-x: hidden;
    }
    
    h1, h2, h3, h4, h5 {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      margin-bottom: 1rem;
    }
    
    /* Navbar mejorada */
    .navbar {
      background-color: var(--primary-color);
      padding: 0.8rem 0;
      box-shadow: var(--shadow-md);
      transition: var(--transition);
    }
    
    .navbar.scrolled {
      padding: 0.5rem 0;
    }
    
    .navbar-brand {
      font-weight: 800;
      font-size: 1.6rem;
      display: flex;
      align-items: center;
      color: white !important;
    }
    
    .navbar-brand img {
      height: 42px;
      margin-right: 12px;
      border-radius: 8px;
    }
    
    .nav-link {
      color: rgba(255, 255, 255, 0.9) !important;
      font-weight: 500;
      margin: 0 4px;
      padding: 8px 16px !important;
      border-radius: 6px;
      transition: var(--transition);
      position: relative;
    }
    
    .nav-link:hover, .nav-link:focus, .nav-link.active {
      color: var(--secondary-color) !important;
      background-color: rgba(255, 255, 255, 0.1);
    }
    
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 2px;
      background-color: var(--secondary-color);
      transition: var(--transition);
    }
    
    .nav-link:hover::after, .nav-link.active::after {
      width: calc(100% - 32px);
    }
    
    .dropdown-menu {
      background-color: white;
      border: none;
      box-shadow: var(--shadow-lg);
      border-radius: var(--border-radius);
      overflow: hidden;
      margin-top: 8px !important;
      padding: 0.5rem;
    }
    
    .dropdown-item {
      padding: 0.7rem 1.2rem;
      transition: var(--transition);
      font-weight: 400;
      border-radius: 6px;
      margin: 2px 0;
    }
    
    .dropdown-item:hover, .dropdown-item:focus {
      background-color: var(--secondary-light);
      color: var(--dark-color) !important;
    }
    
    .btn-acceso {
      background-color: var(--secondary-color);
      color: var(--dark-color);
      font-weight: 600;
      border: none;
      padding: 0.6rem 1.5rem;
      border-radius: 50px;
      transition: var(--transition);
      box-shadow: var(--shadow-sm);
      display: inline-flex;
      align-items: center;
    }
    
    .btn-acceso:hover {
      background-color: #e0a800;
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }
    
    .btn-acceso i {
      margin-left: 8px;
      font-size: 0.9rem;
    }

    /* Hero Section - Rediseñada y optimizada */
    .main-banner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 3rem 2rem;
      background: linear-gradient(120deg, var(--primary-color) 0%, var(--primary-light) 100%);
      position: relative;
      overflow: hidden;
      color: white;
      min-height: 500px;
    }
    
    .main-banner::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: 
        url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.07)"/></svg>');
      background-size: 100px;
      background-position: 0 0;
      z-index: 0;
    }
    
    .banner-content {
      display: flex;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      align-items: center;
      position: relative;
      z-index: 2;
    }
    
    .logo-section {
      flex: 1;
      text-align: center;
      padding-right: 2rem;
      animation: fadeInLeft 0.8s ease-out;
    }
    
    .logo-section img {
      width: 200px;
      border-radius: 20px;
      box-shadow: var(--shadow-lg);
      transition: var(--transition);
      border: 4px solid rgba(255, 255, 255, 0.2);
      background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
      backdrop-filter: blur(5px);
    }
    
    .logo-section img:hover {
      transform: scale(1.05) rotate(2deg);
    }
    
    .info-section {
      flex: 2;
      padding-left: 2rem;
      animation: fadeInRight 0.8s ease-out;
      border-left: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .badge {
      background: linear-gradient(45deg, var(--secondary-color), #ff9800);
      color: var(--dark-color);
      padding: 0.5rem 1.5rem;
      font-weight: 700;
      border-radius: 50px;
      margin-bottom: 1.2rem;
      display: inline-block;
      box-shadow: var(--shadow-sm);
      animation: pulse 2s infinite;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-size: 0.9rem;
    }
    
    .title-section h1 {
      color: white;
      font-size: 2.2rem;
      margin-bottom: 0.8rem;
      line-height: 1.2;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }
    
    .title-section h2 {
      color: rgba(255, 255, 255, 0.9);
      font-size: 1.4rem;
      margin-bottom: 1.5rem;
      font-weight: 500;
    }
    
    .features-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1rem;
      margin: 1.5rem 0;
    }
    
    .feature-item {
      display: flex;
      align-items: center;
      font-size: 1rem;
    }
    
    .feature-item i {
      color: var(--secondary-color);
      margin-right: 0.8rem;
      font-size: 1.1rem;
      width: 24px;
      text-align: center;
    }
    
    .cta-section {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 2rem;
      flex-wrap: wrap;
      gap: 1rem;
    }
    
    .date-info {
      display: flex;
      align-items: center;
      font-size: 1.2rem;
      font-weight: 700;
      color: white;
    }
    
    .date-info i {
      color: var(--secondary-color);
      margin-right: 0.8rem;
      font-size: 1.5rem;
    }
    
    .btn-inscribirse {
      background: linear-gradient(45deg, var(--accent-color), #1e7e34);
      color: white;
      padding: 0.8rem 2rem;
      border-radius: 50px;
      font-weight: 700;
      text-decoration: none;
      box-shadow: var(--shadow-md);
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
    }
    
    .btn-inscribirse:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-lg);
      color: white;
    }
    
    .btn-inscribirse i {
      margin-left: 0.5rem;
    }

    /* Contenido dinámico */
    #contenido-dinamico {
      background-color: white;
      padding: 2.5rem;
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-sm);
      margin: 2.5rem auto;
      max-width: 1200px;
      transition: var(--transition);
      min-height: 400px;
    }
    
    #contenido-dinamico h3 {
      color: var(--primary-color);
      margin-bottom: 1.5rem;
      position: relative;
      padding-bottom: 0.8rem;
      font-size: 1.8rem;
    }
    
    #contenido-dinamico h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 3px;
      background-color: var(--secondary-color);
    }
    
    #contenido-dinamico p {
      font-size: 1.05rem;
      line-height: 1.7;
      color: var(--gray-color);
      margin-bottom: 1.5rem;
    }
    
    /* Footer */
    .footer {
      background-color: var(--primary-color);
      color: white;
      padding: 3rem 0 1.5rem;
      text-align: center;
    }
    
    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1.5rem;
    }
    
    .footer-logo {
      width: 100px;
      margin-bottom: 1.5rem;
      border-radius: 50%;
      box-shadow: var(--shadow-md);
    }
    
    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      text-align: left;
      margin-bottom: 2rem;
    }
    
    .footer-section h5 {
      color: var(--secondary-color);
      font-size: 1.2rem;
      margin-bottom: 1.2rem;
      position: relative;
      padding-bottom: 0.5rem;
    }
    
    .footer-section h5::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 40px;
      height: 2px;
      background-color: var(--secondary-color);
    }
    
    .footer-section p, .footer-section a {
      margin-bottom: 0.7rem;
      display: block;
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      transition: var(--transition);
    }
    
    .footer-section a:hover {
      color: var(--secondary-color);
    }
    
    .social-icons {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }
    
    .social-icons a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      transition: var(--transition);
    }
    
    .social-icons a:hover {
      background: var(--secondary-color);
      transform: translateY(-3px);
    }
    
    .social-icons i {
      font-size: 1.2rem;
    }
    
    .copyright {
      margin-top: 2rem;
      padding-top: 1.5rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      font-size: 0.9rem;
      color: rgba(255, 255, 255, 0.6);
    }
    
    /* Nuevos estilos para las secciones agregadas */
    .features-grid-detailed {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin: 2.5rem 0;
    }
    
    .feature-card {
      background: white;
      padding: 1.8rem;
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-sm);
      text-align: center;
      transition: var(--transition);
      border-top: 4px solid var(--primary-color);
    }
    
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-md);
    }
    
    .feature-icon {
      font-size: 2.5rem;
      color: var(--primary-color);
      margin-bottom: 1.2rem;
      display: inline-block;
      height: 70px;
      width: 70px;
      line-height: 70px;
      background: rgba(145, 27, 39, 0.1);
      border-radius: 50%;
    }
    
    .feature-card h4 {
      color: var(--primary-color);
      margin-bottom: 1rem;
      font-size: 1.3rem;
    }
    
    .feature-card p {
      color: var(--gray-color);
      font-size: 0.95rem;
    }
    
    .cycle-details {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin: 2rem 0;
    }
    
    .cycle-card {
      background: white;
      padding: 1.8rem;
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      border-top: 4px solid var(--secondary-color);
    }
    
    .cycle-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-md);
    }
    
    .cycle-header {
      text-align: center;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid #eee;
    }
    
    .cycle-date {
      font-size: 1.8rem;
      font-weight: bold;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
    }
    
    .cycle-title {
      color: var(--dark-color);
      font-size: 1.4rem;
    }
    
    .cycle-info {
      margin-bottom: 1.5rem;
      color: var(--gray-color);
    }
    
    .cycle-cost {
      background-color: #f8f9fa;
      padding: 1.2rem;
      border-radius: 8px;
      margin-bottom: 1.5rem;
    }
    
    .cycle-cost h5 {
      color: var(--primary-color);
      margin-bottom: 0.8rem;
      font-size: 1.1rem;
    }
    
    .cycle-payment {
      margin-top: 1rem;
      padding-top: 1rem;
      border-top: 1px dashed #ddd;
    }
    
    .cycle-schedule, .cycle-exams {
      margin-bottom: 1.5rem;
    }
    
    .cycle-schedule h5, .cycle-exams h5 {
      color: var(--primary-color);
      margin-bottom: 0.8rem;
      font-size: 1.1rem;
    }
    
    .btn-cycle {
      background-color: var(--accent-color);
      color: white;
      padding: 0.8rem 1.5rem;
      border-radius: 50px;
      display: block;
      text-align: center;
      font-weight: 600;
      text-decoration: none;
      transition: var(--transition);
      margin-top: 1rem;
    }
    
    .btn-cycle:hover {
      background-color: #218838;
      transform: translateY(-2px);
      box-shadow: var(--shadow-sm);
      color: white;
    }
    
    .subject-table {
      width: 100%;
      border-collapse: collapse;
      margin: 1.5rem 0;
      box-shadow: var(--shadow-sm);
      border-radius: 8px;
      overflow: hidden;
    }
    
    .subject-table th, .subject-table td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    
    .subject-table th {
      background-color: var(--primary-color);
      color: white;
      font-weight: 600;
    }
    
    .subject-table tr:nth-child(even) {
      background-color: #f8f9fa;
    }
    
    .subject-table tr:hover {
      background-color: #f1f3f5;
    }
    
    .careers-container {
      margin-top: 2.5rem;
    }
    
    .careers-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-top: 1.5rem;
    }
    
    .career-item {
      background: linear-gradient(145deg, #f8f9fa, #e9ecef);
      padding: 1.5rem;
      border-radius: var(--border-radius);
      text-align: center;
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      min-height: 120px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border-left: 4px solid var(--primary-color);
    }
    
    .career-item:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-md);
      border-left: 4px solid var(--secondary-color);
    }
    
    .career-icon {
      font-size: 2rem;
      color: var(--primary-color);
      margin-bottom: 0.8rem;
    }
    
    .career-item h5 {
      margin-bottom: 0;
      font-size: 1.1rem;
    }
    
    .group-header {
      background-color: var(--primary-color);
      color: white;
      padding: 1rem 1.5rem;
      border-radius: 8px;
      margin: 2rem 0 1.5rem;
      display: flex;
      align-items: center;
    }
    
    .group-header i {
      margin-right: 0.8rem;
      font-size: 1.5rem;
      color: var(--secondary-color);
    }
    
    .group-header h4 {
      margin-bottom: 0;
      color: white;
    }
    
    /* Animaciones */
    @keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translateX(-30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
    
    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
    
    @keyframes pulse {
      0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.4);
      }
      70% {
        transform: scale(1.02);
        box-shadow: 0 0 0 10px rgba(255, 193, 7, 0);
      }
      100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(255, 193, 7, 0);
      }
    }
    
   /* ================================
   Responsive Design
   ================================ */

/* Tablets y pantallas medianas */
@media (max-width: 992px) {
  .main-banner {
    padding: 2rem 1.5rem;
    min-height: auto;
  }

  .banner-content {
    flex-direction: column;
    text-align: center;
    gap: 1.5rem; /* mejor separación entre bloques */
  }

  .logo-section {
    padding-right: 0;
    margin-bottom: 2rem;
  }

  .info-section {
    padding-left: 0;
    border-left: none;
  }

  .title-section h1 {
    font-size: 2rem;
    line-height: 1.3;
  }

  .title-section h2 {
    font-size: 1.3rem;
    font-weight: 400;
  }

  .features-grid {
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.2rem;
  }

  .cta-section {
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 1rem;
  }
}

/* Dispositivos pequeños: móviles */
@media (max-width: 768px) {
  .navbar-brand {
    font-size: 1.3rem;
    text-align: center;
  }

  #contenido-dinamico {
    padding: 1rem;
    margin: 0.5rem;
  }

  .footer-grid {
    grid-template-columns: 1fr;
    text-align: center;
    gap: 1.5rem;
  }

  .footer-section h5::after {
    left: 50%;
    transform: translateX(-50%);
  }

  .social-icons {
    justify-content: center;
    gap: 1rem;
  }

  .cycle-details,
  .careers-grid {
    grid-template-columns: 1fr;
    gap: 1rem;
  }

  .title-section h1 {
    font-size: 1.6rem;
  }

  .title-section h2 {
    font-size: 1.1rem;
  }
}

/* Extra pequeño: móviles muy reducidos (≤480px) */
@media (max-width: 480px) {
  .navbar-brand {
    font-size: 1.1rem;
  }

  .main-banner {
    padding: 1.2rem 1rem;
  }

  .title-section h1 {
    font-size: 1.4rem;
  }

  .title-section h2 {
    font-size: 1rem;
  }

  .features-grid {
    grid-template-columns: 1fr;
  }

  .cta-section button {
    width: 100%;
  }


    }
  </style>
</head>

<body>
  <!-- Navegación mejorada -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="imagenes/1749717676_buho.jpg" alt="Logo CBT">
        CBT
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="#" onclick="mostrarContenido(event, 'inicio')">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarContenido(event, 'nosotros')">Nosotros</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="ciclosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciclos
            </a>
            <ul class="dropdown-menu" aria-labelledby="ciclosDropdown">
              <li><a class="dropdown-item" href="#" onclick="mostrarContenido(event, 'ciclo1')"><i class="fas fa-book me-2"></i>INTENSIVO</a></li>
              <li><a class="dropdown-item" href="#" onclick="mostrarContenido(event, 'ciclo2')"><i class="fas fa-project-diagram me-2"></i>ORDINARIO I</a></li>
              <li><a class="dropdown-item" href="#" onclick="mostrarContenido(event, 'ciclo3')"><i class="fas fa-graduation-cap me-2"></i>ORDINARIO II</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="gruposDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Grupos
            </a>
            <ul class="dropdown-menu" aria-labelledby="gruposDropdown">
              <li><a class="dropdown-item" href="#" onclick="mostrarContenido(event, 'grupoA')"><i class="fas fa-calendar-weekend me-2"></i>Grupo A </a></li>
              <li><a class="dropdown-item" href="#" onclick="mostrarContenido(event, 'grupoB')"><i class="fas fa-calendar-weekend me-2"></i>Grupo B  </a></li>
              <li><a class="dropdown-item" href="#" onclick="mostrarContenido(event, 'grupoC')"><i class="fas fa-calendar-weekend me-2"></i>Grupo C  </a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarContenido(event, 'inscripcion')">Inscripción</a></li>
          
        <li class="nav-item"><a class="nav-link" href="#" onclick="mostrarContenido(event, 'carreras')">Programas de Estudio</a></li>
        
<li class="nav-item">
  <a class="nav-link" href="https://www.istta.edu.pe" target="_blank" rel="noopener noreferrer">
    www.istta.edu.pe
  </a>
</li>

      
      </ul>

        <a href="/login" class="btn btn-acceso">ACCESO <i class="fas fa-sign-in-alt"></i></a>
      </div>
    </div>
  </nav>

  <!-- Banner Principal Optimizado -->
  <section class="main-banner">
    <div class="banner-content">
      <div class="logo-section">
        <img src="imagenes/1749717676_buho.jpg" alt="Logo Buho CBT" class="img-fluid" />
      </div>
      
      <div class="info-section">
        
        <div class="title-section">
          <h1>INSCRIPCIONES ABIERTAS</h1>
          
        
        <p>Preparación pre-tecnológica y pre-universitaria de excelencia con ingreso directo a nuestros programas de estudio.</p>
        
        <div class="features-grid">
          <div class="feature-item"><i class="fas fa-check-circle"></i> Docentes de primer nivel</div>
          <div class="feature-item"><i class="fas fa-check-circle"></i> Material digital para todas las asignaturas</div>
          <div class="feature-item"><i class="fas fa-check-circle"></i>Amplia y cómoda infraestructura</div>
          <div class="feature-item"><i class="fas fa-check-circle"></i> Orientación vocacional y asesoría en psicopedagogía</div>
           <div class="feature-item"><i class="fas fa-check-circle"></i>Control de asistencia permanente</div>

        
        </div>
        
        <div class="cta-section">
          <div class="date-info">
            <i class="fas fa-calendar-alt"></i> INICIO - CICLO INTENSIVO: 05 DE ENERO 2026
          </div>
         
 <a href="/preinscripciones/create" class="btn btn-primary btn-lg">
                    <i class="fas fa-file-signature me-2"></i> INSCRIBETE AHORA</a>        
                  </div>

                 <a href="#" id="open">▶ VER VIDEO</a>

<div id="modal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.8);justify-content:center;align-items:center;">
  <div style="position:relative;width:90%;max-width:800px;">
    <span id="close" style="position:absolute;top:-10px;right:-10px;background:#fff;color:#000;border-radius:50%;padding:5px;cursor:pointer;">✕</span>
    <iframe id="vid" src="https://drive.google.com/file/d/12qYEcqOA8TqciWKGKyEypsVXkSDTHf-V/preview" width="100%" height="450" style="border:none;" allowfullscreen></iframe>
  </div>
</div>

<script>
let modal=document.getElementById('modal'),
    vid=document.getElementById('vid'),
    src=vid.src;

document.getElementById('open').onclick=e=>{e.preventDefault();modal.style.display='flex';}
document.getElementById('close').onclick=()=>{modal.style.display='none';vid.src=src;}
</script>

      </div>
    </div>
  </section>

  <!-- Contenido dinámico mejorado -->
  <main class="container">
    <div id="contenido-dinamico">
      <!-- El contenido se cargará dinámicamente mediante JavaScript -->
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <img src="imagenes/1749717676_buho.jpg" alt="Logo CBT" class="footer-logo">
      
      <div class="footer-grid">
        <div class="footer-section">
          <h5>Horarios de Atención</h5>
          <p>Lunes a Viernes: 8:00 am - 8:00 pm</p>
          <p>Sábados: 9:00 am - 2:00 pm</p>
        </div>
        
        <div class="footer-section">
          <h5>Contacto</h5>
          <p><i class="fab fa-whatsapp"></i> <a href="https://wa.me/51966338738">+51 966338738</a></p>
          <p><i class="fas fa-envelope"></i> <a href="mailto:admin.cbt@istta.edu.pe">admin.cbt@istta.edu.pe</a></p>
          <p><i class="fas fa-map-marker-alt"></i> Av. Cusco 496 – San Sebastián</p>
        </div>
        
        <div class="footer-section">
          <h5>Enlaces Rápidos</h5>
          <p><a href="#">Inscripciones</a></p>
          <p><a href="#">Preguntas Frecuentes</a></p>
          <p><a href="#">Blog Educativo</a></p>
        </div>
        
        <div class="footer-section">
          <h5>Síguenos</h5>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
      
      <div class="copyright">
        <p>&copy; 2025 CBT - Ciclo Básico Tecnológico. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>

  <!-- Scripts mejorados -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
    
    // Función de contenido dinámico con animaciones
    function mostrarContenido(event, seccion) {
      event.preventDefault();
      const contenedor = document.getElementById("contenido-dinamico");
      
      // Animación de salida
      contenedor.style.opacity = '0';
      contenedor.style.transform = 'translateY(20px)';
      
      setTimeout(() => {
        let contenido = "";
        
        switch (seccion) {
          case "inicio":
            contenido = `
              <h3>Bienvenido al CBT</h3>
              <p>Explora nuestras oportunidades académicas diseñadas para tu éxito profesional. El Ciclo Básico Tecnológico te ofrece una formación sólida con docentes calificados, infraestructura moderna y un enfoque práctico que te preparará para los desafíos del mundo laboral y innovacion.</p>
              
              <div class="features-grid-detailed">
                <div class="feature-card">
                  <div class="feature-icon">
                    <i class="fas fa-history"></i>
                  </div>
                  <h4>EXPERIENCIA</h4>
                  <p>Más de 50 años de brillante trayectoria académica y cultural formando estudiantes de alto nivel.</p>
                </div>
                
                <div class="feature-card">
                  <div class="feature-icon">
                    <i class="fas fa-compass"></i>
                  </div>
                  <h4>ORIENTACIÓN VOCACIONAL</h4>
                  <p>Orientamos al estudiante en la elección de su carrera, contemplando sus aptitudes y actitudes.</p>
                </div>
                
                <div class="feature-card">
                  <div class="feature-icon">
                    <i class="fas fa-book"></i>
                  </div>
                  <h4>MATERIAL DIDÁCTICO</h4>
                  <p>Otorgamos textos elaborados según la programación curricular de cada ciclo y conforme al avance del sistema curricular.</p>
                </div>
                
                <div class="feature-card">
                  <div class="feature-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                  </div>
                  <h4>DOCENTES CALIFICADOS</h4>
                  <p>Docentes especializados con una innovadora y amplia experiencia en la enseñanza prectecnologica y preuniversitaria.</p>
                </div>
              </div>
            `;
            break;
            
          case "nosotros":
            contenido = `
              <h3>¿Quiénes somos?</h3>
              <div class="row mt-4">
                <div class="col-md-6">
                  <h4><i class="fas fa-bullseye me-2"></i>MISIÓN</h4>
                  <p>Somos un centro educativo líder en formación pre tecnológico y pre universitaria; que brinda una enseñanza de calidad con estilo propio y estrategias metodológicas innovadoras sustentadas en la tecnología, de alto nivel académico y cultura organizacional, dirigidas a descubrir los conocimientos, habilidades y valores de nuestros estudiantes.</p>
                </div>
                <div class="col-md-6">
                  <h4><i class="fas fa-eye me-2"></i>VISIÓN</h4>
                  <p>Al 2027 ser una institución con excelencia educativa, acreditada y licenciada, reconocida a nivel nacional brindando formación profesional basada en la investigación e innovación tecnologica, formando profesionales técnicos que lideren el mercado laboral nacional, with sólidos valores y comprometidos con el cuidado del medio ambiente.</p>
                </div>
              </div>
            `;
            break;
            
          case "inscripcion":
            contenido = `
              <div class="container mt-5">
                <h3 class="mb-4 text-center">Proceso de Inscripción</h3>
                <p class="text-center">Completa el formulario de inscripción en línea o acércate a nuestra sede para recibir atención personalizada.</p>
                
                <div class="row mt-4">
                  <div class="col-md-6">
                    <h4><i class="fas fa-file-alt me-2"></i>Requisitos</h4>
                    <ul class="list-unstyled">
                      <li><i class="fas fa-money-bill-wave me-2 text-primary"></i> comprobante de pago de matrícula</li>

                    </ul>
                  </div>
                  <div class="col-md-6">
                    <h4><i class="fas fa-calendar-check me-2"></i>Proceso</h4>
                    <ol class="list-unstyled">
                      <li><strong>Paso 1:</strong> Llenar formulario de inscripción</li>
                      <li><strong>Paso 2:</strong> Entrevista con el departamento académico</li>
                      <li><strong>Paso 4:</strong> Entrega de materiales</li>
                    </ol>
                  </div>
                </div>
                <div class="text-center mt-4">
 <a href="/preinscripciones/create" class="btn btn-primary btn-lg">
                    <i class="fas fa-file-signature me-2"></i> Ir al Formulario de Inscripción
                </a>                  </a>
                </div>
              </div>
            `;
            break;
            
          case "ciclo1":
            contenido = `
              <h3>Ciclo Intensivo 2025</h3>
              <div class="cycle-details">
                <div class="cycle-card">
                  <div class="cycle-header">
                    <div class="cycle-date">DURACION: ENERO - MARZO</div>
                    <div class="cycle-title">CICLO INTENSIVO 2025</div>
                  </div>
                  <div class="cycle-info">
                    <p>¡Ingreso directo al IEST - Túpac Amaru vía CBT!</p>
                    <p>Preparación al más alto nivel Pre Universitario y Pre Tecnológico. Ofrecemos educación gratuita a la población estudiantil en nuestros 10 programas de estudio.</p>
                  </div>
                  
                  <div class="cycle-cost">
                    <h5><i class="fas fa-money-bill-wave me-2"></i>COSTO</h5>
                    <p><strong>Una Cuota:</strong> s/. 600.00 soles</p>
                    <div class="cycle-payment">
                      <p><strong>Dos Cuotas:</strong></p>
                      <p>1ra. Cuota: S/. 400.00</p>
                      <p>2da. Cuota: S/. 250.00 (Antes del primer examen)</p>
                    </div>
                    <p><i class="fas fa-university me-2"></i> <strong>Depósito en Cta. Cte:</strong> 00-161-005398</p>
                    <p><i class="fas fa-building me-2"></i> <strong>Pago en el local del Instituto:</strong> Atención de lunes a viernes de 8:00 a 14:00</p>
                  </div>
                  
                  <div class="cycle-schedule">
                    <h5><i class="fas fa-clock me-2"></i>TURNO</h5>
                    <p>Mañana: 7:00 a 13:00</p>
                  </div>
                  
                  <div class="cycle-exams">
                    <h5><i class="fas fa-calendar-alt me-2"></i>EXÁMENES</h5>
                    <p><strong>Primero:</strong> 28 de enero</p>
                    <p><strong>Segundo:</strong> 25 de febrero</p>
                    <p><strong>Tercero:</strong> 25 de marzo</p>
                  </div>
                  
                  <a href="#" class="btn-cycle">Inscríbete <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
              </div>
            `;
            break;
            
          case "ciclo2":
            contenido = `
              <h3>Ciclo Ordinario I - 2025</h3>
              <div class="cycle-details">
                <div class="cycle-card">
                  <div class="cycle-header">
                    <div class="cycle-date">DURACION: MAYO - AGOSTO</div>
                    <div class="cycle-title">CICLO ORDINARIO I - 2025</div>
                  </div>
                  <div class="cycle-info">
                    <p>¡Ingreso directo al IEST - Túpac Amaru vía CBT!</p>
                    <p>Preparación al más alto nivel Preuniversitario y Pretecnológico. Ofrecemos educación gratuita a la población estudiantil en nuestros 10 programas de estudio.</p>
                  </div>
                  
                  <div class="cycle-cost">
                    <h5><i class="fas fa-money-bill-wave me-2"></i>COSTO</h5>
                    <p><strong>Una Cuota:</strong> s/. 600.00</p>
                    <div class="cycle-payment">
                      <p><strong>Dos Cuotas:</strong></p>
                      <p>1ra. Cuota: S/. 400.00</p>
                      <p>2da. Cuota: S/. 250.00 (Antes del primer examen)</p>
                    </div>
                    <p><i class="fas fa-university me-2"></i> <strong>Depósito a la Cta. Cte:</strong> 00-161-005398</p>
                    <p><i class="fas fa-building me-2"></i> <strong>Pago en el local del Instituto:</strong> Atención de lunes a viernes de 8:00 a 14:00</p>
                  </div>
                  
                  <div class="cycle-schedule">
                    <h5><i class="fas fa-clock me-2"></i>TURNO</h5>
                    <p>Tarde: 14:00 a 19:00</p>
                  </div>
                  
                  <div class="cycle-exams">
                    <h5><i class="fas fa-calendar-alt me-2"></i>EXÁMENES</h5>
                    <p><strong>Primero:</strong> 10 de junio</p>
                    <p><strong>Segundo:</strong> 8 de julio</p>
                    <p><strong>Tercero:</strong> 5 de agosto</p>
                  </div>
                  
                  <a href="#" class="btn-cycle">Inscríbete <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
              </div>
            `;
            break;
            
          case "ciclo3":
            contenido = `
              <h3>Ciclo Ordinario II - 2025</h3>
              <div class="cycle-details">
                <div class="cycle-card">
                  <div class="cycle-header">
                    <div class="cycle-date">DURACION: SEPTIEMBRE - DICIEMBRE</div>
                    <div class="cycle-title">CICLO ORDINARIO II</div>
                  </div>
                  <div class="cycle-info">
                    <p>¡Ingreso directo al IEST - Túpac Amaru vía CBT!</p>
                    <p>Preparación al más alto nivel Preuniversitario y Pretecnológico. Ofrecemos educación gratuita a la población estudiantil.</p>
                  </div>
                  
                  <div class="cycle-cost">
                    <h5><i class="fas fa-money-bill-wave me-2"></i>COSTO</h5>
                    <p><strong>Una Cuota:</strong> s/. 600.00</p>
                    <div class="cycle-payment">
                      <p><strong>Dos Cuotas:</strong></p>
                      <p>1ra. Cuota: S/. 400.00</p>
                      <p>2da. Cuota: S/. 250.00 (Antes del primer examen)</p>
                    </div>
                    <p><i class="fas fa-university me-2"></i> <strong>Depósito a la Cta. Cte:</strong> 00-161-005398</p>
                    <p><i class="fas fa-building me-2"></i> <strong>Pago en el local del Instituto:</strong> Atención de lunes a viernes de 8:00 a 14:00</p>
                  </div>
                  
                  <div class="cycle-schedule">
                    <h5><i class="fas fa-clock me-2"></i>TURNO</h5>
                    <p>Tarde: 14:00 a 20:00</p>
                  </div>
                  
                  <div class="cycle-exams">
                    <h5><i class="fas fa-calendar-alt me-2"></i>EXÁMENES</h5>
                    <p><strong>Primero:</strong> por definir</p>
                    <p><strong>Segundo:</strong> Por definir</p>
                    <p><strong>Tercero:</strong> Por definir</p>
                  </div>
                  
                  <a href="#" class="btn-cycle">Inscríbete <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
              </div>
            `;
            break;
            
          case "grupoA":
            contenido = `
              <h3>Grupo A </h3>
              <div class="row mt-4">
                <div class="col-md-6">
                  <h4><i class="fas fa-clock me-2"></i>Horario</h4>
                  <p>Lunes a Viernes</p>
                 
              
              
              <h4 class="mt-5">Asignaturas - Grupo A</h4>
              <table class="subject-table">
                <thead>
                  <tr>
                    <th>ASIGNATURAS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td><i class="fas fa-book me-2 text-primary"></i> Competencia Comunicativa</td></tr>
                  <tr><td><i class="fas fa-calculator me-2 text-primary"></i> Matemática I - Aritmética</td></tr>
                  <tr><td><i class="fas fa-square-root-variable me-2 text-primary"></i> Matemática I - Álgebra</td></tr>
                  <tr><td><i class="fas fa-chart-line me-2 text-primary"></i> Economía</td></tr>
                  <tr><td><i class="fas fa-shapes me-2 text-primary"></i> Matemática II - Geometría y Trigonometría</td></tr>
                  <tr><td><i class="fas fa-atom me-2 text-primary"></i> Física</td></tr>
                </tbody>
              </table>
            `;
            break;
            
          case "grupoB":
            contenido = `
              <h3>Grupo B </h3>
              <div class="row mt-4">
                <div class="col-md-6">
                  <h4><i class="fas fa-clock me-2"></i>Horario</h4>
                  <p>Lunes a Viernes</p>
                 
              <h4 class="mt-5">Asignaturas - Grupo B</h4>
              <table class="subject-table">
                <thead>
                  <tr>
                    <th>ASIGNATURAS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td><i class="fas fa-book me-2 text-primary"></i> Competencia Comunicativa</td></tr>
                  <tr><td><i class="fas fa-calculator me-2 text-primary"></i> Matemática I - Aritmética</td></tr>
                  <tr><td><i class="fas fa-square-root-variable me-2 text-primary"></i> Matemática I - Álgebra</td></tr>
                  <tr><td><i class="fas fa-chart-line me-2 text-primary"></i> Economía</td></tr>
                  <tr><td><i class="fas fa-dna me-2 text-primary"></i> Biología</td></tr>
                  <tr><td><i class="fas fa-flask me-2 text-primary"></i> Química</td></tr>
                </tbody>
              </table>
            `;
            break;
            
          case "grupoC":
            contenido = `
              <h3>Grupo C </h3>
              <div class="row mt-4">
                <div class="col-md-6">
                  <h4><i class="fas fa-clock me-2"></i>Horario</h4>
                  <p>Lunes a Viernes </p>

              <h4 class="mt-5">Asignaturas - Grupo C</h4>
              <table class="subject-table">
                <thead>
                  <tr>
                    <th>ASIGNATURAS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td><i class="fas fa-book me-2 text-primary"></i> Competencia Comunicativa</td></tr>
                  <tr><td><i class="fas fa-calculator me-2 text-primary"></i> Matemática I - Aritmética</td></tr>
                  <tr><td><i class="fas fa-square-root-variable me-2 text-primary"></i> Matemática I - Álgebra</td></tr>
                  <tr><td><i class="fas fa-chart-line me-2 text-primary"></i> Economía</td></tr>
                  <tr><td><i class="fas fa-globe-americas me-2 text-primary"></i> Geografía</td></tr>
                  <tr><td><i class="fas fa-landmark me-2 text-primary"></i> Historia</td></tr>
                </tbody>
              </table>
            `;
            break;
            case "carreras":
  contenido = `
  <section style="font-family: 'Poppins', sans-serif; max-width:1200px; margin:0 auto; padding:3rem 1rem; color:#333;">
    <h2 style="text-align:center; font-size:2.8rem; color:#911b27; margin-bottom:1rem; animation:fadeInDown 1s ease;">Programas de Estudio por Grupos</h2>
    <p style="text-align:center; color:#555; font-size:1.15rem; max-width:850px; margin:0 auto 3rem; animation:fadeIn 1.5s ease;">
      Contamos con 10 programas de estudio organizados por grupos para que elijas según tu vocación y aptitudes. Nuestro sistema de ingreso directo te permite acceder a la carrera de tu preferencia.
    </p>

    <!-- Contenedor de Grupos -->
    <div class="groups-container" style="display:grid; gap:3rem;">

      <!-- Grupo A -->
      <div class="group" style="animation:fadeInLeft 1s ease;">
        <div style="display:flex; align-items:center; gap:0.7rem; margin-bottom:1rem;">
          <i class="fas fa-sun" style="color:#ffc107; font-size:1.7rem;"></i>
          <h3 style="color:#911b27; font-size:1.7rem;">Grupo A - Carreras Técnicas</h3>
        </div>
        <div class="careers-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:1.2rem;">
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#fef3e0,#fff7e6);">
              <i class="fas fa-bolt" style="font-size:2.2rem; color:#28a745;"></i>
              <h4>Electricidad Industrial</h4>
            </div>
            <div class="card-back" style="background:#911b27; color:#fff;">
              <p>Aprende electricidad industrial con prácticas en laboratorios de última generación y docentes expertos.</p>
            </div>
          </div>
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#fef3e0,#fff7e6);">
              <i class="fas fa-microchip" style="font-size:2.2rem; color:#28a745;"></i>
              <h4>Electrónica Industrial</h4>
            </div>
            <div class="card-back" style="background:#911b27; color:#fff;">
              <p>Domina circuitos y sistemas electrónicos con prácticas y docentes certificados.</p>
            </div>
          </div>
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#fef3e0,#fff7e6);">
              <i class="fas fa-laptop-code" style="font-size:2.2rem; color:#28a745;"></i>
              <h4>Sistemas de Información</h4>
            </div>
            <div class="card-back" style="background:#911b27; color:#fff;">
              <p>Desarrolla aplicaciones y sistemas con tecnología de punta y docentes especializados.</p>
            </div>
          </div>
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#fef3e0,#fff7e6);">
              <i class="fas fa-car" style="font-size:2.2rem; color:#28a745;"></i>
              <h4>Mecánica Automotriz</h4>
            </div>
            <div class="card-back" style="background:#911b27; color:#fff;">
              <p>Aprende mantenimiento y reparación automotriz con prácticas reales y docentes expertos.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Grupo B -->
      <div class="group" style="animation:fadeInLeft 1s ease 0.2s;">
        <div style="display:flex; align-items:center; gap:0.7rem; margin-bottom:1rem;">
          <i class="fas fa-cloud-sun" style="color:#ffc107; font-size:1.7rem;"></i>
          <h3 style="color:#911b27; font-size:1.7rem;">Grupo B - Carreras Técnicas</h3>
        </div>
        <div class="careers-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:1.2rem;">
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#e0f7f3,#d0f0ed);">
              <i class="fas fa-user-md" style="font-size:2.2rem; color:#911b27;"></i>
              <h4>Enfermería Técnica</h4>
            </div>
            <div class="card-back" style="background:#28a745; color:#fff;">
              <p>Formación práctica en salud con laboratorios y docentes especializados en enfermería.</p>
            </div>
          </div>
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#e0f7f3,#d0f0ed);">
              <i class="fas fa-vial" style="font-size:2.2rem; color:#911b27;"></i>
              <h4>Laboratorio Clínico</h4>
            </div>
            <div class="card-back" style="background:#28a745; color:#fff;">
              <p>Aprende análisis clínicos con prácticas reales y supervisión de expertos en laboratorio.</p>
            </div>
          </div>
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#e0f7f3,#d0f0ed);">
              <i class="fas fa-microscope" style="font-size:2.2rem; color:#911b27;"></i>
              <h4>Anatomía Patológica</h4>
            </div>
            <div class="card-back" style="background:#28a745; color:#fff;">
              <p>Estudia anatomía patológica con prácticas guiadas y docentes altamente calificados.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Grupo C -->
      <div class="group" style="animation:fadeInLeft 1s ease 0.4s;">
        <div style="display:flex; align-items:center; gap:0.7rem; margin-bottom:1rem;">
          <i class="fas fa-calendar-weekend" style="color:#ffc107; font-size:1.7rem;"></i>
          <h3 style="color:#911b27; font-size:1.7rem;">Grupo C - Carreras Técnicas</h3>
        </div>
        <div class="careers-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:1.2rem;">
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#fff4e0,#fff9eb);">
              <i class="fas fa-map-marked-alt" style="font-size:2.2rem; color:#28a745;"></i>
              <h4>Guía de Turismo</h4>
            </div>
            <div class="card-back" style="background:#911b27; color:#fff;">
              <p>Conviértete en guía oficial con prácticas profesionales y asesoramiento experto.</p>
            </div>
          </div>
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#fff4e0,#fff9eb);">
              <i class="fas fa-calculator" style="font-size:2.2rem; color:#28a745;"></i>
              <h4>Contabilidad</h4>
            </div>
            <div class="card-back" style="background:#911b27; color:#fff;">
              <p>Domina contabilidad financiera y práctica con docentes calificados.</p>
            </div>
          </div>
          <div class="career-card">
            <div class="card-front" style="background:linear-gradient(135deg,#fff4e0,#fff9eb);">
              <i class="fas fa-concierge-bell" style="font-size:2.2rem; color:#28a745;"></i>
              <h4>Hostelería y Restaurantes</h4>
            </div>
            <div class="card-back" style="background:#911b27; color:#fff;">
              <p>Aprende administración y servicios con prácticas reales y docentes expertos.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Orientación Vocacional -->
      <div style="text-align:center; margin-top:4rem; animation:fadeInUp 1s ease 0.6s;">
        <h3 style="color:#911b27; margin-bottom:0.5rem;">Orientación Vocacional</h3>
        <p style="color:#555; max-width:800px; margin:0 auto; font-size:1.15rem;">
          Nuestro servicio de orientación vocacional te ayudará a identificar la carrera que mejor se adapte a tus habilidades e intereses. Contamos con pruebas especializadas y asesoramiento personalizado.
        </p>
      </div>
    </div>

    <style>
      /* Animaciones */
      @keyframes fadeIn { from {opacity:0} to {opacity:1} }
      @keyframes fadeInDown { from {opacity:0; transform:translateY(-20px);} to {opacity:1; transform:translateY(0);} }
      @keyframes fadeInLeft { from {opacity:0; transform:translateX(-20px);} to {opacity:1; transform:translateX(0);} }
      @keyframes fadeInUp { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }

      /* Tarjetas flip */
      .career-card {
        perspective: 1000px;
        border-radius:12px;
      }
      .career-card .card-front, .career-card .card-back {
        border-radius:12px;
        backface-visibility: hidden;
        padding:1.2rem;
        min-height:180px;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        transition: transform 0.6s;
      }
      .career-card .card-back {
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        transform:rotateY(180deg);
      }
      .career-card:hover .card-front { transform: rotateY(180deg); }
      .career-card:hover .card-back { transform: rotateY(0deg); }

      /* Smooth hover */
      .career-card h4 { margin-top:0.5rem; font-weight:600; }
      .career-card p { text-align:center; font-size:0.95rem; line-height:1.4; }
    </style>
  </section>
  `;
  break;

            
          default:
            contenido = `
              <h3>Bienvenido al CBT</h3>
              <p>Explora nuestras oportunidades académicas diseñadas para tu éxito profesional. Selecciona una opción del menú para descubrir más información sobre nuestros programas, ciclos y procesos de inscripción.</p>
              
              <div class="features-grid-detailed">
                <div class="feature-card">
                  <div class="feature-icon">
                    <i class="fas fa-graduation-cap"></i>
                  </div>
                  <h4>Excelencia Académica</h4>
                  <p>Programas de estudio diseñados para tu éxito profesional con los más altos estándares de calidad.</p>
                </div>
                
                <div class="feature-card">
                  <div class="feature-icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <h4>Docentes Calificados</h4>
                  <p>Profesionales con amplia experiencia académica y laboral comprometidos con tu formación.</p>
                </div>
                
                <div class="feature-card">
                  <div class="feature-icon">
                    <i class="fas fa-laptop"></i>
                  </div>
                  <h4>Tecnología Educativa</h4>
                  <p>Aulas equipadas con tecnología de última generación para una experiencia de aprendizaje moderna.</p>
                </div>
                
                <div class="feature-card">
                  <div class="feature-icon">
                    <i class="fas fa-briefcase"></i>
                  </div>
                  <h4>Enfoque Laboral</h4>
                  <p>Formación orientada a las necesidades del mercado laboral actual y futuro.</p>
                </div>
              </div>
            `;
        }
        
        contenedor.innerHTML = contenido;
        
        // Animación de entrada
        setTimeout(() => {
          contenedor.style.opacity = '1';
          contenedor.style.transform = 'translateY(0)';
        }, 50);
        
        // Actualizar navegación activa
        document.querySelectorAll('.nav-link').forEach(link => {
          link.classList.remove('active');
        });
        event.target.classList.add('active');
        
        // Scroll suave
        window.scrollTo({
          top: contenedor.offsetTop - 100,
          behavior: 'smooth'
        });
      }, 300);
    }
    
    // Inicializar con contenido de inicio
    document.addEventListener('DOMContentLoaded', function() {
      mostrarContenido({preventDefault: () => {}}, 'inicio');
    });
  </script>

  <script>
document.addEventListener('DOMContentLoaded', () => {
  const b = document.body;
  b.style.userSelect = 'none';
  
  // Bloqueos globales
  const block = e => e.preventDefault();

  ['contextmenu','selectstart','dragstart','copy','cut','paste'].forEach(ev => document.addEventListener(ev, block));

  // Teclas bloqueadas: F12, Ctrl+Shift+I/C/J, Ctrl+U, PrintScreen
  document.addEventListener('keydown', e => {
    if(e.key==='F12' || e.key==='PrintScreen' ||
       (e.ctrlKey && e.shiftKey && ['I','C','J'].includes(e.key.toUpperCase())) ||
       (e.ctrlKey && e.key.toUpperCase()==='U')) {
      e.preventDefault();
      if(e.key==='PrintScreen') navigator.clipboard.writeText('');
      alert('Acción bloqueada por protección de contenido.');
    }
  });

  // Detectar DevTools abierto
  setInterval(() => {
    if(window.outerWidth - window.innerWidth > 160 || window.outerHeight - window.innerHeight > 160){
      alert('DevTools detectado. Página protegida.');
      location.reload();
    }
  },1000);
});
</script>

</body>
</html>