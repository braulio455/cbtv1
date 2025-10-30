<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <title>Dashboard Educativo - CBT</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Preload logo (mejora la experiencia del loader) -->
  <link rel="preload" href="imagenes/1749717676_buho.jpg" as="image">

  <!-- Fuentes -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Quicksand:wght@500;600&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- SweetAlert2 defer -->
  <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    :root{
      --primary-100: #F2FAFF;
      --primary-300: #CFEFFF;
      --primary-500: #82C7F8;
      --primary-700: #2E7FCC;
      --secondary:   #85D0B3;
      --accent:      #FFB074;
      --bg:          #F6FBFF;
      --text:        #0F2130;
      --sidebar-w:   260px;
      --radius:      12px;
      --shadow-lg:   0 12px 36px rgba(16,34,52,0.08);
      --transition:  260ms cubic-bezier(.22,.9,.35,1);
    }

    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family:'Poppins',system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial;
      background: linear-gradient(180deg,var(--primary-100),#f9fdff);
      color:var(--text);
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      overflow-x:hidden;
    }

    /* SIDEBAR */
    nav.sidebar{
      position:fixed;inset:0 auto 0 0;
      width:var(--sidebar-w);height:100vh;padding:1rem;
      background: linear-gradient(180deg,var(--primary-500),var(--primary-700));
      color:#fff;display:flex;flex-direction:column;gap:.6rem;
      z-index:1200;box-shadow:var(--shadow-lg);transition:transform var(--transition);overflow:auto;
    }
    .brand{display:flex;align-items:center;gap:.6rem;padding-bottom:.5rem;border-bottom:1px solid rgba(255,255,255,0.06)}
    .logo-img{width:44px;height:44px;border-radius:8px;overflow:hidden;background:rgba(255,255,255,0.06);display:inline-flex;align-items:center;justify-content:center}
    .brand h1{margin:0;font-family:'Quicksand';font-size:1.05rem;font-weight:600}
    .brand small{opacity:.92;font-size:.78rem}

    .nav-list{margin-top:.7rem;display:flex;flex-direction:column;gap:.18rem}
    .nav-item{
      display:flex;align-items:center;gap:.75rem;padding:.64rem .9rem;border-radius:10px;text-decoration:none;color:rgba(255,255,255,0.95);
      font-weight:600;font-size:.95rem;position:relative;transition:transform var(--transition),background var(--transition);
    }
    .nav-item i{min-width:1.15rem;text-align:center}
    .nav-item:hover{transform:translateX(6px);background:rgba(255,255,255,0.06);color:var(--accent)}
    .nav-item.active{background:rgba(255,255,255,0.08);color:var(--accent)}
    .nav-item.active::before{content:"";position:absolute;left:-8px;top:0;height:100%;width:5px;background:linear-gradient(180deg,var(--accent),#FFD166);border-radius:0 6px 6px 0}

    .sidebar-footer{margin-top:auto;font-size:.82rem;color:rgba(255,255,255,0.85);display:flex;justify-content:space-between;gap:.5rem;padding-top:.6rem;border-top:1px solid rgba(255,255,255,0.04)}

    /* TOGGLE (mobile) */
    button#toggleSidebar{
      position:fixed;left:14px;top:14px;width:46px;height:46px;border-radius:10px;border:0;background:#fff;color:var(--primary-700);
      display:none;align-items:center;justify-content:center;z-index:1300;box-shadow:var(--shadow-lg);cursor:pointer;
    }

    /* HEADER */
    header.header{
      position:fixed;left:var(--sidebar-w);top:0;height:68px;width:calc(100% - var(--sidebar-w));padding:.6rem 1rem;z-index:1100;
      transition:left var(--transition),width var(--transition),backdrop-filter .25s;
      backdrop-filter: blur(6px) saturate(1.02);
      display:flex;align-items:center;gap:1rem;
    }
    .topbar{width:100%;display:flex;align-items:center;gap:1rem;background:linear-gradient(180deg,rgba(255,255,255,0.92),rgba(255,255,255,0.86));padding:.5rem;border-radius:10px;box-shadow:0 6px 20px rgba(12,25,44,0.04)}
    .welcome{display:flex;align-items:center;gap:.8rem;min-width:0}
    .welcome h4{margin:0;font-size:1rem;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .welcome small{display:block;font-size:.82rem;color:rgba(16,34,52,0.56)}
    .user-actions{margin-left:auto;display:flex;align-items:center;gap:.6rem}
    .avatar{width:42px;height:42px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--primary-500),var(--secondary));color:#fff;font-weight:700;box-shadow:0 8px 28px rgba(43,119,214,0.12)}
    .btn-logout{border-radius:999px;padding:.44rem .7rem;border:1px solid rgba(20,30,50,0.06);background:#fff;cursor:pointer;font-weight:700;display:inline-flex;gap:.5rem;align-items:center}
    .btn-logout:hover{background:var(--primary-500);color:#fff;border-color:var(--primary-500)}

    /* ensure header leaves room for toggle on small screens */
    @media (max-width:1200px){
      header.header{left:0;width:100%;padding-left:72px} /* 72px leaves space for toggle */
      button#toggleSidebar{display:flex}
    }

    /* MAIN container (below header) */
    main.main{
      position:fixed;top:68px;left:var(--sidebar-w);width:calc(100% - var(--sidebar-w));height:calc(100vh - 68px);padding:1rem;transition:left var(--transition),width var(--transition);
    }
    .content-shell{width:100%;height:100%;border-radius:var(--radius);background:linear-gradient(180deg,#fff,#fbfeff);box-shadow:var(--shadow-lg);overflow:hidden;position:relative}

    /* IFRAME */
    iframe#iframeContenido{width:100%;height:100%;border:0;background:#fff;display:block;opacity:1;transition:opacity .36s ease}

    /* Loader overlay (logo + progress) */
    .loader-overlay{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:1rem;background:linear-gradient(180deg, rgba(130,199,248,0.08), rgba(46,127,204,0.03));z-index:1400;backdrop-filter: blur(2px);opacity:0;visibility:hidden;pointer-events:none;transition:opacity .28s,visibility .28s}
    .loader-overlay.show{opacity:1;visibility:visible;pointer-events:auto}
    .loader-card{display:flex;flex-direction:column;align-items:center;gap:.75rem;padding:1rem 1.2rem;border-radius:14px;background:linear-gradient(180deg,#fff,#f7fbff);box-shadow:0 8px 30px rgba(13,48,86,0.08);border:1px solid rgba(13,48,86,0.03)}
    .loader-logo{width:84px;height:84px;border-radius:14px;overflow:hidden;display:flex;align-items:center;justify-content:center}
    .loader-logo img{width:100%;height:100%;object-fit:cover;transform-origin:center;animation:logoPulse 1400ms infinite ease-in-out}
    @keyframes logoPulse{0%{transform:scale(0.96) rotate(0deg)}50%{transform:scale(1.03) rotate(2deg)}100%{transform:scale(0.96)}}
    .loader-text{font-weight:700;color:var(--primary-700)}
    .loader-sub{font-size:.88rem;color:rgba(16,34,52,0.55)}
    .loader-progress{width:160px;height:6px;background:rgba(16,34,52,0.06);border-radius:8px;overflow:hidden}
    .loader-progress > i{display:block;height:100%;width:0%;background:linear-gradient(90deg,var(--accent),#FFD166);transition:width 520ms linear}

    /* HERO - pantalla de inicio */
    .hero{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:1rem;padding:1.6rem;background:linear-gradient(180deg, rgba(130,199,248,0.03), rgba(46,127,204,0.01));z-index:100;transition:opacity .28s,visibility .28s}
    .hero.hidden{opacity:0;visibility:hidden;pointer-events:none}
    .hero-card{display:flex;flex-direction:column;align-items:center;gap:1rem;padding:1.2rem;border-radius:14px;background:linear-gradient(180deg,#ffffff,#f4fbff);box-shadow:0 14px 40px rgba(16,34,52,0.06);border:1px solid rgba(13,48,86,0.03)}
    .hero-logo{width:120px;height:120px;border-radius:16px;overflow:hidden}
    .hero-logo img{width:100%;height:100%;object-fit:cover}
    .hero-title{font-size:1.25rem;font-weight:700;color:var(--primary-700);text-align:center}
    .hero-sub{font-size:.98rem;color:rgba(16,34,52,0.64);text-align:center;max-width:560px}

    /* screen overlay when sidebar open (mobile) */
    .screen-overlay{position:fixed;inset:0;background:rgba(3,7,18,0.36);z-index:1150;display:none}
    .screen-overlay.show{display:block}

    /* Responsive tweaks */
    @media (max-width: 1200px){
      nav.sidebar{transform:translateX(-110%) ;position:fixed}
      nav.sidebar.show{transform:translateX(0)}
      main.main{left:0;width:100%}
    }
    @media (max-width: 768px){
      .hero-logo{width:96px;height:96px}
      .hero-title{font-size:1.05rem}
      .hero-sub{font-size:.92rem;padding:0 1rem}
      .brand h1{font-size:1rem}
    }
    @media (max-width:420px){
      .loader-card{padding:.8rem}
      .loader-logo{width:68px;height:68px}
      .hero-logo{width:80px;height:80px}
    }

    a:focus,button:focus{outline:3px solid rgba(130,199,248,0.14);outline-offset:3px;border-radius:10px}
  </style>
</head>
<body>
  <!-- overlay for small screens -->
  <div id="screenOverlay" class="screen-overlay" aria-hidden="true"></div>

  <!-- toggle button (mobile) -->
  <button id="toggleSidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Abrir menú">
    <i class="bi bi-list" aria-hidden="true" style="font-size:1.1rem"></i>
  </button>

  <!-- SIDEBAR -->
  <nav id="sidebar" class="sidebar" role="navigation" aria-label="Menú principal">
    <div class="brand" aria-hidden="false">
      <div class="logo-img" aria-hidden="true">
        <img src="imagenes/1749717676_buho.jpg" alt="Logo CBT" style="width:100%;height:100%;object-fit:cover">
      </div>
      <div>
        <h1>CBT</h1>
        <small>Educación</small>
      </div>
    </div>

    <div class="nav-list" role="menu" aria-label="Navegación principal">
      <!-- Keep original structure; JS will use href attribute -->
      <a class="nav-item active" data-url="/inicio" href="/inicio" role="menuitem"><i class="bi bi-house"></i><span>Inicio</span></a>
      <a class="nav-item" data-url="/preinscripciones" href="/preinscripciones" role="menuitem"><i class="bi bi-file-earmark-text"></i><span>Preinscripciones</span></a>
      <a class="nav-item" data-url="/grupos" href="/grupos" role="menuitem"><i class="bi bi-people"></i><span>Grupos</span></a>
      <a class="nav-item" data-url="/inscripciones/create" href="/inscripciones/create" role="menuitem"><i class="bi bi-person-plus"></i><span>Inscripciones</span></a>
      <a class="nav-item" data-url="/asignaturas" href="/asignaturas" role="menuitem"><i class="bi bi-book"></i><span>Asignaturas</span></a>
      <a class="nav-item" data-url="/docentes" href="/docentes" role="menuitem"><i class="bi bi-person-workspace"></i><span>Docentes</span></a>
      <a class="nav-item" data-url="/reportes" href="/reportes" role="menuitem"><i class="bi bi-bar-chart"></i><span>Reportes</span></a>
      <a class="nav-item" data-url="/asistencias" href="/asistencias" role="menuitem"><i class="bi bi-calendar-check"></i><span>Asistencias</span></a>
      <a class="nav-item" data-url="/pagos/buscar" href="/pagos/buscar" role="menuitem"><i class="bi bi-cash-stack"></i><span>Pagos</span></a>
    </div>

    <div class="sidebar-footer" aria-hidden="false">
      <div>v1.0</div>
      <div>Soporte CBT</div>
    </div>
  </nav>

  <!-- HEADER -->
  <header class="header" role="banner" aria-label="Barra superior">
    <div class="topbar" role="region" aria-label="Barra de usuario">
      <div class="welcome" aria-live="polite">
        <div>
          <h4 title="Bienvenido">Bienvenido, <strong style="color:var(--primary-700)">{{ $nombre_completo ?? 'Usuario' }}</strong></h4>
          <small>{{ $rol ?? 'Administrador' }}</small>
        </div>
      </div>

      <div class="user-actions" role="group" aria-label="Acciones de usuario">
        <div class="avatar" title="{{ $nombre_completo ?? 'Usuario' }}">{{ strtoupper(substr($nombre_completo ?? 'U',0,1)) }}</div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
        <button id="btnLogout" class="btn-logout" aria-label="Cerrar sesión">
          <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
          <span style="font-weight:700">Salir</span>
        </button>
      </div>
    </div>
  </header>

  <!-- MAIN -->
  <main class="main" id="main" role="main">
    <div class="content-shell" id="contentShell" aria-live="polite">
      <!-- HERO (Inicio) -->
      <div id="hero" class="hero" role="region" aria-label="Pantalla de inicio">
        <div class="hero-card">
          <div class="hero-logo">
            <img src="imagenes/1749717676_buho.jpg" alt="Logo CBT">
          </div>
          <div class="hero-title">Bienvenido al Sistema Educativo CBT</div>
          <div class="hero-sub">Accede a los módulos desde el menú izquierdo. El sistema es optimizado y pensado para transmitir calma y claridad.</div>
        </div>
      </div>

      <!-- IFRAME -->
      <iframe id="iframeContenido" src="/dashboard" name="iframeContenido" title="Contenido principal" sandbox="allow-same-origin allow-forms allow-scripts allow-popups"></iframe>

      <!-- Loader overlay -->
      <div id="loaderOverlay" class="loader-overlay" role="status" aria-hidden="true" aria-live="assertive">
        <div class="loader-card" role="presentation">
          <div class="loader-logo">
            <img src="imagenes/1749717676_buho.jpg" alt="Logo CBT">
          </div>
          <div class="loader-text">Cargando...</div>
          <div class="loader-sub">Preparando la sección seleccionada</div>
          <div class="loader-progress" aria-hidden="true"><i id="loaderBar"></i></div>
        </div>
      </div>
    </div>
  </main>

  <script>
  (function(){
    'use strict';

    // Elements
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');
    const screenOverlay = document.getElementById('screenOverlay');
    const navList = Array.from(document.querySelectorAll('.nav-item'));
    const iframe = document.getElementById('iframeContenido');
    const loader = document.getElementById('loaderOverlay');
    const loaderBar = document.getElementById('loaderBar');
    const hero = document.getElementById('hero');
    const btnLogout = document.getElementById('btnLogout');

    // Helpers
    const sameOrigin = (url) => {
      try {
        const u = new URL(url, location.origin);
        return u.origin === location.origin;
      } catch(e){ return false; }
    };

    const isDashboardOrInicio = (url) => {
      try {
        const path = new URL(url, location.origin).pathname;
        return path === '/dashboard' || path === '/inicio' || path === '/';
      } catch(e){ return false; }
    };

    // Loader animation
    let progressInterval = null;
    function showLoader(){
      loader.classList.add('show');
      loader.setAttribute('aria-hidden','false');
      document.body.style.overflow = 'hidden';
      loaderBar.style.width = '6%';
      let value = 6;
      if(progressInterval) { clearInterval(progressInterval); progressInterval = null; }
      progressInterval = setInterval(()=>{
        value += Math.random()*6;
        if(value >= 78){ value = 78; clearInterval(progressInterval); progressInterval = null; }
        loaderBar.style.width = Math.floor(value) + '%';
      }, 300);
    }
    function hideLoader(fast=false){
      if(progressInterval){ clearInterval(progressInterval); progressInterval = null; }
      loaderBar.style.width = '100%';
      setTimeout(()=>{
        loader.classList.remove('show');
        loader.setAttribute('aria-hidden','true');
        loaderBar.style.width = '0%';
        document.body.style.overflow = '';
      }, fast ? 160 : 360);
    }

    // Manage hero visibility
    function updateHeroVisibility(url, activeNavEl){
      if (activeNavEl && (activeNavEl.getAttribute('href') || activeNavEl.dataset.url).includes('/inicio')) {
        hero.classList.remove('hidden');
        return;
      }
      if (isDashboardOrInicio(url)) {
        hero.classList.remove('hidden');
        return;
      }
      hero.classList.add('hidden');
    }

    // Set active nav
    function setActive(navEl){
      navList.forEach(n => n.classList.remove('active'));
      if(navEl) navEl.classList.add('active');
    }

    // Load a section into iframe (safe, non-aggressive)
    function loadSection(url, navEl){
      if(!url) return;
      // use href directly (ensure proper absolute/relative path as server expects)
      const finalHref = (navEl && navEl.getAttribute('href')) ? navEl.getAttribute('href') : url;

      // mobile close sidebar
      if(window.innerWidth <= 1200){
        sidebar.classList.remove('show');
        screenOverlay.classList.remove('show');
        toggleBtn.setAttribute('aria-expanded','false');
      }

      setActive(navEl);
      updateHeroVisibility(finalHref, navEl);

      showLoader();
      iframe.style.opacity = '0.35';

      // Append timestamp to avoid caching
      const finalUrl = finalHref + (finalHref.includes('?') ? '&' : '?') + 't=' + Date.now();
      iframe.src = finalUrl;

      // onload: hide loader; only attempt safe checks for login (same-origin)
      function onloadHandler(){
        try {
          if (sameOrigin(iframe.src)) {
            const doc = iframe.contentDocument || iframe.contentWindow.document;
            const bodyText = doc && doc.body ? (doc.body.textContent || '') : '';
            // only react to explicit login forms to reload top-level
            if (/name="_token"|login-form|form id="login-form"/i.test(bodyText)) {
              window.location.reload();
              return;
            }
          }
        } catch(e){
          console.debug('No se pudo inspeccionar iframe (cross-origin o restricción).');
        } finally {
          iframe.style.opacity = '1';
          hideLoader();
          iframe.removeEventListener('load', onloadHandler);
          iframe.removeEventListener('error', onerrorHandler);
        }
      }

      function onerrorHandler(){
        iframe.style.opacity = '1';
        hideLoader(true);
        if(window.Swal){
          Swal.fire({icon:'error',title:'Error al cargar',text:`No se pudo cargar: ${finalHref}`,confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-700') || '#2E7FCC'});
        } else {
          alert('No se pudo cargar: ' + finalHref);
        }
        iframe.removeEventListener('load', onloadHandler);
        iframe.removeEventListener('error', onerrorHandler);
      }

      iframe.addEventListener('load', onloadHandler);
      iframe.addEventListener('error', onerrorHandler);
    }

    // Delegate navigation clicks and keyboard
    navList.forEach((el, idx) => {
      el.addEventListener('click', function(e){
        e.preventDefault();
        const href = this.getAttribute('href') || this.dataset.url || '/';
        loadSection(href, this);
      });
      el.addEventListener('keydown', function(e){
        if(e.key === 'Enter' || e.key === ' '){
          e.preventDefault();
          const href = this.getAttribute('href') || this.dataset.url || '/';
          loadSection(href, this);
        }
      });
    });

    // Toggle sidebar on mobile
    toggleBtn.addEventListener('click', function(){
      const open = sidebar.classList.toggle('show');
      screenOverlay.classList.toggle('show', open);
      this.setAttribute('aria-expanded', String(open));
    });
    screenOverlay.addEventListener('click', function(){ sidebar.classList.remove('show'); this.classList.remove('show'); toggleBtn.setAttribute('aria-expanded','false'); });

    // Logout handler
    if(btnLogout){
      btnLogout.addEventListener('click', function(){
        if(window.Swal){
          Swal.fire({
            title:'¿Cerrar sesión?',
            text:'Se cerrará tu sesión actual.',
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-700') || '#2E7FCC',
            confirmButtonText:'Sí, salir',
            cancelButtonText:'Cancelar'
          }).then(res => { if(res.isConfirmed) document.getElementById('logout-form').submit(); });
        } else {
          if(confirm('¿Cerrar sesión?')) document.getElementById('logout-form').submit();
        }
      });
    }

    // Initial load: show loader briefly and configure hero
    document.addEventListener('DOMContentLoaded', function(){
      // set active to inicio if exists
      const inicioNav = navList.find(n => (n.getAttribute('href') || n.dataset.url) === '/inicio' );
      if(inicioNav) setActive(inicioNav);

      // initial loader
      showLoader();
      // fallback to hide loader after 8s to avoid stuck state
      const fallback = setTimeout(()=>{ hideLoader(); }, 8000);

      // on first iframe load update hero visibility
      function initialLoad(){
        clearTimeout(fallback);
        try {
          const curUrl = iframe.src;
          updateHeroVisibility(curUrl, inicioNav);
        } catch(e){ updateHeroVisibility('/', inicioNav); }
        hideLoader();
        iframe.removeEventListener('load', initialLoad);
      }
      iframe.addEventListener('load', initialLoad);

      // keyboard shortcuts Ctrl/Cmd + 1..9 to open nav items
      document.addEventListener('keydown', function(e){
        if((e.ctrlKey || e.metaKey) && !isNaN(parseInt(e.key))){
          const idx = parseInt(e.key,10) - 1;
          if(navList[idx]){
            navList[idx].focus();
            navList[idx].click();
          }
        }
      });

      // close sidebar when resizing to larger screens
      window.addEventListener('resize', function(){
        if(window.innerWidth > 1200){
          sidebar.classList.remove('show');
          screenOverlay.classList.remove('show');
          toggleBtn.setAttribute('aria-expanded','false');
        }
      });
    });

    // Expose function if needed externally
    window.cbtLoadSection = loadSection;

  })();
  </script>
</body>
</html>
