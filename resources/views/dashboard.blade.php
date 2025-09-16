<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CBT</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Estilos CSS (sin cambios) */
        :root {
            --vino-claro: #a52a2a;
            --vino-oscuro: #600000;
            --dorado: #f9c449;
            --dorado-claro: #ffe58a;
            --bg-color: #fffaf3;
            --sidebar-width: 270px;
        }
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            background-color: var(--bg-color);
            overflow: hidden;
            transition: background 0.3s ease;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--vino-oscuro), var(--vino-claro));
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
            color: white;
            z-index: 1000;
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.3);
            overflow-y: auto;
            border-right: 3px solid var(--dorado);
            transition: transform 0.4s ease;
        }
        .sidebar .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--dorado);
            text-align: center;
            margin-bottom: 2rem;
            letter-spacing: 1px;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
            animation: fadeInDown 1s ease-out;
        }
        .sidebar .logo i {
            font-size: 2.4rem;
            margin-bottom: 0.6rem;
            display: block;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.95);
            text-decoration: none;
            padding: 0.9rem 1rem;
            margin-bottom: 0.4rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1rem;
            font-weight: 500;
            position: relative;
        }
        .sidebar a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 6px;
            height: 60%;
            background-color: var(--dorado);
            border-radius: 0 5px 5px 0;
            opacity: 0;
            transform: translateY(-50%);
            transition: opacity 0.3s ease;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, 0.15);
            color: var(--dorado);
            transform: translateX(6px);
        }
        .sidebar a.active::before {
            opacity: 1;
        }
        .header {
            margin-left: var(--sidebar-width);
            height: 70px;
            background: white;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid var(--dorado);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 900;
            animation: fadeInDown 0.8s ease;
        }
        .header h5 {
            margin: 0;
            font-size: 1.4rem;
            color: var(--vino-oscuro);
            font-weight: 600;
            font-family: 'Playfair Display', serif;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-avatar {
            width: 45px;
            height: 45px;
            background-color: var(--dorado);
            color: var(--vino-oscuro);
            font-weight: bold;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        .user-avatar:hover {
            background-color: var(--dorado-claro);
            transform: scale(1.05);
        }
        .main {
            margin-left: var(--sidebar-width);
            height: calc(100vh - 70px);
            background: var(--bg-color);
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease-in-out;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 16px;
            background-color: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .iframe-loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--dorado), var(--dorado-claro));
            animation: loader 2s infinite;
        }
        @keyframes loader {
            0% { transform: scaleX(0); transform-origin: left; }
            50% { transform: scaleX(1); transform-origin: left; }
            100% { transform: scaleX(0); transform-origin: right; }
        }
        .logout-btn {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .logout-btn:hover {
            opacity: 0.9;
        }
        @media(max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                position: absolute;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .header, .main {
                margin-left: 0;
            }
        }
        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <i class="bi bi-mortarboard-fill"></i>
            CBT
        </div>
        <a href="#" id="dashboard" class="active" onclick="cargarSeccion('/dashboard', this)"><i class="bi bi-house"></i>Inicio</a>
        <a href="#" id="preinscripciones" onclick="cargarSeccion('/preinscripciones', this)">
    <i class="bi bi-file-earmark-person"></i> Preinscripciones
</a>
        <a href="#" onclick="cargarSeccion('/grupos', this)"><i class="bi bi-person-plus"></i>Grupos y Programas</a>
        <a href="#" id="inscripciones" onclick="cargarSeccion('/inscripciones/create', this)"><i class="bi bi-person-plus"></i>Inscripciones</a>
        <a href="#" id="asignaturas" onclick="cargarSeccion('/asignaturas', this)"><i class="bi bi-journal-bookmark"></i>Asignaturas</a>
        <a href="#" id="docentes" onclick="cargarSeccion('/docentes', this)"><i class="bi bi-person-video2"></i>Docentes</a>
        <a href="#" id="reportes" onclick="cargarSeccion('/reportes', this)"><i class="bi bi-file-earmark-bar-graph"></i>Reportes</a>
        <a href="#" id="asistencias" onclick="cargarSeccion('/asistencias', this)"><i class="bi bi-calendar-check"></i>Asistencias</a>
<a href="#" id="pagos" onclick="cargarSeccion('/pagos/buscar', this)"><i class="bi bi-calendar-check"></i> Actualizar Pagos
</a>

    </div>
    <div class="header">
        <h5>Bienvenido, {{ $nombre_completo ?? 'Administrador' }}</h5>
        <div class="user-info">
            <div class="user-avatar">{{ $iniciales ?? 'AD' }}</div>

            <!-- Formulario oculto para logout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <!-- Botón de logout mejorado -->
            <a href="#" onclick="confirmLogout()" class="btn btn-sm btn-outline-dark logout-btn">
                <i class="bi bi-box-arrow-right"></i> Salir
            </a>
        </div>
    </div>
    <div class="main">
        <div id="iframeLoader" class="iframe-loader" style="display: none;"></div>
        <iframe id="iframeContenido" src="/dashboard" name="iframeContenido"></iframe>
    </div>
    <script>
        // Función para cargar secciones en el iframe
        function cargarSeccion(url, element) {
            event.preventDefault();

            // Si ya está activo, no hacer nada
            if(element.classList.contains('active')) return;

            const links = document.querySelectorAll('.sidebar a');
            links.forEach(link => link.classList.remove('active'));
            element.classList.add('active');
            const loader = document.getElementById('iframeLoader');
            const iframe = document.getElementById('iframeContenido');

            loader.style.display = 'block';
            iframe.style.opacity = 0;

            // Forzar recarga si es la misma URL
            if(iframe.src.endsWith(url)) {
                url += (url.includes('?') ? '&' : '?') + 't=' + Date.now();
            }

            iframe.src = url;
            iframe.onload = function() {
                loader.style.display = 'none';
                iframe.style.opacity = 1;

                // Verificar si hay errores en el contenido cargado
                try {
                    const iframeDoc = this.contentDocument || this.contentWindow.document;
                    if(iframeDoc.body.innerHTML.includes("404") ||
                       iframeDoc.title.includes("Error") ||
                       iframeDoc.querySelector('h1')?.textContent.includes("Not Found")) {
                        mostrarErrorCarga(url);
                    }

                    // Manejar sesión expirada
                    if(iframeDoc.body.innerHTML.includes("login-form")) {
                        window.location.reload();
                    }
                } catch(e) {
                    console.error("Error verificando contenido:", e);
                }
            };
            iframe.onerror = function() {
                mostrarErrorCarga(url);
            };
        }

        function mostrarErrorCarga(url) {
            document.getElementById('iframeLoader').style.display = 'none';
            Swal.fire({
                icon: 'error',
                title: 'Error al cargar',
                text: `No se pudo cargar la página: ${url}`,
                confirmButtonText: 'Entendido'
            });
        }

        function confirmLogout() {
            event.preventDefault();
            Swal.fire({
                title: '¿Cerrar sesión?',
                text: "¿Estás seguro que deseas salir del sistema?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, salir',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        // Manejar clics dentro del iframe
        window.addEventListener('load', function() {
            const iframe = document.getElementById('iframeContenido');

            iframe.contentWindow.addEventListener('click', function(e) {
                if (e.target.tagName === 'A' && e.target.getAttribute('target') !== '_blank') {
                    e.preventDefault();
                    const href = e.target.getAttribute('href');
                    if (href) {
                        // Buscar el enlace correspondiente en el sidebar
                        const sidebarLinks = document.querySelectorAll('.sidebar a');
                        for(let link of sidebarLinks) {
                            if(link.getAttribute('onclick')?.includes(href)) {
                                cargarSeccion(href, link);
                                return;
                            }
                        }
                        // Si no se encuentra en el sidebar, cargar normalmente
                        cargarSeccion(href, document.querySelector('.sidebar a.active'));
                    }
                }
            }, true);
        });

        // Inicializar con la página de dashboard
        document.addEventListener('DOMContentLoaded', function() {
            const iframe = document.getElementById('iframeContenido');

            iframe.addEventListener('error', function() {
                mostrarErrorCarga(iframe.src);
            });
        });
    </script>
</body>
</html>
