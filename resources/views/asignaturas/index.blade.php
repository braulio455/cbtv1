<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --turquesa: #00CED1;
      --turquesa-dark: #00A8A8;
      --turquesa-light: #E0F7FA;
      --naranja: #FF6B35;
      --naranja-dark: #E55A2B;
      --naranja-light: #FFE8E0;
      --crema: #FAFDFE;
      --gris: #F8F9FA;
      --text: #2C3E50;
      --border: #E1E8ED;
      --shadow: 0 2px 12px rgba(0, 206, 209, 0.15);
      --shadow-hover: 0 8px 25px rgba(0, 206, 209, 0.25);
    }

    * {
      border-radius: 0 !important;
    }

    body {
      background: linear-gradient(135deg, var(--crema) 0%, #ffffff 100%);
      font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
      color: var(--text);
      padding: 0;
      min-height: 100vh;
      line-height: 1.6;
    }

    .container {
      max-width: 1400px;
      padding: 1.5rem;
    }

    /* Header Styles */
    .main-header {
      background: linear-gradient(135deg, var(--turquesa) 0%, var(--turquesa-dark) 100%);
      color: white;
      padding: 1.5rem 0;
      margin-bottom: 1.5rem;
      border-bottom: 4px solid var(--naranja);
      box-shadow: var(--shadow);
    }

    .main-header h2 {
      font-weight: 800;
      letter-spacing: -0.5px;
      margin: 0;
      font-size: 2rem;
    }

    /* Button Styles */
    .btn-turquesa {
      background: linear-gradient(135deg, var(--turquesa) 0%, var(--turquesa-dark) 100%);
      color: white;
      font-weight: 600;
      border: none;
      padding: 0.6rem 1.25rem;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: var(--shadow);
      position: relative;
      overflow: hidden;
    }

    .btn-turquesa:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-hover);
      color: white;
    }

    .btn-naranja {
      background: linear-gradient(135deg, var(--naranja) 0%, var(--naranja-dark) 100%);
      color: white;
      font-weight: 600;
      border: none;
      padding: 0.6rem 1.25rem;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 2px 12px rgba(255, 107, 53, 0.2);
    }

    .btn-naranja:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
      color: white;
    }

    .btn-outline-turquesa {
      border: 2px solid var(--turquesa);
      color: var(--turquesa);
      font-weight: 600;
      background: transparent;
      padding: 0.5rem 1rem;
      transition: all 0.3s ease;
    }

    .btn-outline-turquesa:hover {
      background: var(--turquesa);
      color: white;
      transform: translateY(-1px);
    }

    /* Card Styles */
    .card {
      border: 1px solid var(--border);
      background: white;
      box-shadow: var(--shadow);
      margin-bottom: 1.25rem;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background: linear-gradient(to bottom, var(--turquesa), var(--naranja));
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-hover);
    }

    .card-header {
      background: linear-gradient(135deg, var(--turquesa-light) 0%, white 100%);
      border-bottom: 2px solid var(--turquesa-light);
      padding: 1rem 1.25rem;
      font-weight: 700;
      color: var(--text);
      font-size: 1rem;
    }

    .card-header .grupo-title {
      color: var(--turquesa-dark);
      font-weight: 800;
      margin-bottom: 0.25rem;
    }

    /* Form Styles - COMPACTOS */
    .compact-form {
      transition: all 0.3s ease;
      max-height: 500px;
      overflow: hidden;
    }

    .compact-form.collapsed {
      max-height: 0;
      opacity: 0;
      margin: 0;
      padding: 0;
    }

    .form-control {
      border: 2px solid var(--border);
      padding: 0.6rem 0.8rem;
      transition: all 0.3s ease;
      font-size: 0.9rem;
    }

    .form-control:focus {
      border-color: var(--turquesa);
      box-shadow: 0 0 0 0.2rem rgba(0, 206, 209, 0.15);
    }

    .form-label {
      font-weight: 600;
      color: var(--turquesa-dark);
      margin-bottom: 0.4rem;
      font-size: 0.9rem;
    }

    /* Table Styles */
    .table-responsive {
      border: 1px solid var(--border);
      margin-top: 1rem;
    }

    .table {
      margin: 0;
      border-collapse: separate;
      border-spacing: 0;
      font-size: 0.9rem;
    }

    .table thead th {
      background: linear-gradient(135deg, var(--turquesa) 0%, var(--turquesa-dark) 100%);
      color: white;
      font-weight: 600;
      padding: 0.75rem;
      border: none;
      position: sticky;
      top: 0;
      font-size: 0.85rem;
    }

    .table tbody tr {
      transition: all 0.2s ease;
    }

    .table tbody tr:hover {
      background-color: var(--turquesa-light);
    }

    .table tbody td {
      padding: 0.75rem;
      border-bottom: 1px solid var(--border);
      vertical-align: middle;
    }

    /* Modal Styles */
    .modal-content {
      border: none;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .modal-header {
      background: linear-gradient(135deg, var(--turquesa) 0%, var(--turquesa-dark) 100%);
      color: white;
      padding: 1rem 1.25rem;
      border-bottom: 3px solid var(--naranja);
    }

    .modal-header .btn-close {
      filter: invert(1);
      opacity: 0.8;
    }

    /* Alert Styles */
    .alert {
      border: none;
      padding: 0.8rem 1rem;
      margin-bottom: 1rem;
      box-shadow: var(--shadow);
      border-left: 4px solid var(--turquesa);
      font-size: 0.9rem;
    }

    .alert-success {
      background: var(--turquesa-light);
      color: var(--turquesa-dark);
      border-left-color: var(--turquesa);
    }

    .alert-danger {
      background: var(--naranja-light);
      color: var(--naranja-dark);
      border-left-color: var(--naranja);
    }

    /* Animation Classes */
    .fade-in {
      animation: fadeIn 0.4s ease-out;
    }

    .slide-down {
      animation: slideDown 0.3s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideDown {
      from { opacity: 0; max-height: 0; }
      to { opacity: 1; max-height: 500px; }
    }

    /* Gestión Mode Styles */
    .gestion-col {
      transition: all 0.3s ease;
    }

    /* Badge & Status */
    .badge-turquesa {
      background: var(--turquesa);
      color: white;
      padding: 0.3rem 0.6rem;
      font-weight: 600;
      font-size: 0.7rem;
    }

    .empty-state {
      text-align: center;
      padding: 2rem 1rem;
      color: var(--turquesa-dark);
    }

    .empty-state i {
      font-size: 2.5rem;
      margin-bottom: 0.75rem;
      opacity: 0.7;
    }

    /* Action Buttons */
    .btn-action {
      padding: 0.4rem;
      width: 32px;
      height: 32px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s ease;
      font-size: 0.8rem;
    }

    .btn-action:hover {
      transform: scale(1.1);
    }

    /* Toggle Form Button */
    .toggle-form-btn {
      background: transparent;
      border: 2px dashed var(--turquesa);
      color: var(--turquesa);
      padding: 0.5rem 1rem;
      font-size: 0.85rem;
      transition: all 0.3s ease;
      width: 100%;
      margin-bottom: 1rem;
    }

    .toggle-form-btn:hover {
      background: var(--turquesa-light);
      border-style: solid;
    }

    /* Confirmation Message */
    .confirmation-message {
      position: fixed;
      top: 1.5rem;
      right: 1.5rem;
      z-index: 9999;
      min-width: 280px;
      box-shadow: var(--shadow-hover);
      border-left: 4px solid var(--naranja);
      animation: slideInRight 0.4s ease-out;
    }

    @keyframes slideInRight {
      from { transform: translateX(100%); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }

    /* Data Counter */
    .data-counter {
      font-size: 0.8rem;
      color: var(--turquesa-dark);
      font-weight: 600;
      margin-left: 0.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .container {
        padding: 1rem;
      }
      
      .main-header {
        padding: 1.25rem 0;
      }
      
      .main-header h2 {
        font-size: 1.5rem;
      }
      
      .btn {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
      }
      
      .table-responsive {
        font-size: 0.8rem;
      }
      
      .card-header {
        padding: 0.75rem 1rem;
      }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: var(--gris);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--turquesa);
    }
  </style>
</head>
<body>
  <!-- Header -->
 
        <button class="btn btn-naranja" onclick="toggleGestion()" id="gestionToggle">
          <i class="bi bi-tools me-1"></i> 
          <span id="gestionText">Activar Gestión</span>
        </button>
      </div>
    </div>
  </div>

  <div class="container">
    <!-- Alert Messages -->
    <div class="alert-container">
      @foreach (['success', 'info', 'danger', 'error'] as $msg)
        @if(session($msg))
          <div class="alert alert-{{ $msg === 'error' ? 'danger' : $msg }} alert-dismissible fade show slide-down" role="alert">
            <i class="bi bi-{{ $msg === 'success' ? 'check-circle' : ($msg === 'danger' ? 'exclamation-triangle' : 'info-circle') }}-fill me-2"></i> 
            {{ session($msg) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
      @endforeach
    </div>

    <!-- Grupos Container -->
    <div class="grupos-container">
      @foreach($grupos as $grupo)
        <div class="card fade-in">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <div class="grupo-title">
                  <i class="bi bi-folder2 me-2"></i>{{ $grupo->nombre }}
                </div>
                @if($grupo->descripcion)
                  <small class="text-muted">{{ $grupo->descripcion }}</small>
                @endif
              </div>
              <div class="d-flex align-items-center">
                <span class="badge-turquesa">
                  {{ $grupo->asignaturas->count() }}
                </span>
                <span class="data-counter">asignatura(s)</span>
              </div>
            </div>
          </div>

          <div class="card-body">
            <!-- Toggle Form Button -->
            <button class="toggle-form-btn gestion-form d-none" onclick="toggleAddForm('{{ $grupo->id }}')" id="toggleBtn-{{ $grupo->id }}">
              <i class="bi bi-plus-circle me-1"></i> Añadir Nueva Asignatura
            </button>

            <!-- Add Asignatura Form - COMPACTO -->
            <form method="POST" action="{{ route('asignaturas.store') }}" 
                  class="compact-form gestion-form d-none collapsed" 
                  id="form-{{ $grupo->id }}">
              @csrf
              <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
              <div class="row g-2 align-items-end">
                <div class="col-md-5">
                  <label class="form-label">Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre de asignatura" required>
                </div>
                <div class="col-md-5">
                  <label class="form-label">Descripción</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="Opcional">
                </div>
                <div class="col-md-2">
                  <button type="submit" class="btn btn-turquesa w-100">
                    <i class="bi bi-plus me-1"></i> Añadir
                  </button>
                </div>
              </div>
            </form>

            <!-- Asignaturas Table -->
            @if($grupo->asignaturas->count() > 0)
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th width="50">#</th>
                      <th>Asignatura</th>
                      <th>Descripción</th>
                      <th width="100" class="text-center gestion-col d-none">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($grupo->asignaturas as $key => $asignatura)
                      <tr class="fade-in">
                        <td class="text-center fw-bold text-turquesa">{{ $key + 1 }}</td>
                        <td class="fw-semibold">{{ $asignatura->nombre }}</td>
                        <td class="text-muted">{{ $asignatura->descripcion ?: '—' }}</td>
                        <td class="text-center gestion-col d-none">
                          <div class="btn-group">
                            <button class="btn btn-action btn-outline-turquesa me-1" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal{{ $asignatura->id }}">
                              <i class="bi bi-pencil"></i>
                            </button>
                            <form method="POST" action="{{ route('asignaturas.destroy', $asignatura) }}" class="d-inline">
                              @csrf @method('DELETE')
                              <button type="button" onclick="confirmDelete(this)" class="btn btn-action btn-outline-danger">
                                <i class="bi bi-trash3"></i>
                              </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="empty-state">
                <i class="bi bi-journal-x"></i>
                <h6>No hay asignaturas registradas</h6>
                <p class="text-muted small">Activa el modo gestión para añadir la primera asignatura</p>
              </div>
            @endif
          </div>
        </div>

        <!-- Edit Modals for Asignaturas -->
        @foreach($grupo->asignaturas as $asignatura)
          <div class="modal fade" id="editModal{{ $asignatura->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <form class="modal-content" method="POST" action="{{ route('asignaturas.update', $asignatura) }}">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">
                    <i class="bi bi-pencil-square me-2"></i> Editar Asignatura
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
                  <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" value="{{ $asignatura->nombre }}" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="2">{{ $asignatura->descripcion }}</textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-turquesa" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-naranja">
                    <i class="bi bi-check-circle me-1"></i> Guardar
                  </button>
                </div>
              </form>
            </div>
          </div>
        @endforeach
      @endforeach
    </div>

    <!-- Confirmation Message -->
    <div id="confirmationMessage" class="alert alert-success confirmation-message d-none" role="alert">
      <i class="bi bi-check-circle-fill me-2"></i> 
      <span id="confirmationText"></span>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Gestión Mode Toggle
    function toggleGestion() {
      const gestionElements = document.querySelectorAll('.gestion-form, .gestion-col');
      const toggleBtn = document.getElementById('gestionToggle');
      const gestionText = document.getElementById('gestionText');
      
      let isActive = !gestionElements[0].classList.contains('d-none');
      
      gestionElements.forEach(element => {
        if (isActive) {
          // Deactivate
          element.classList.add('d-none');
          toggleBtn.classList.remove('btn-naranja');
          toggleBtn.classList.add('btn-turquesa');
          gestionText.textContent = 'Activar Gestión';
          
          // Collapse all forms
          document.querySelectorAll('.compact-form').forEach(form => {
            form.classList.add('collapsed');
          });
        } else {
          // Activate
          element.classList.remove('d-none');
          toggleBtn.classList.remove('btn-turquesa');
          toggleBtn.classList.add('btn-naranja');
          gestionText.textContent = 'Gestión Activa';
        }
      });
    }

    // Toggle Add Form
    function toggleAddForm(grupoId) {
      const form = document.getElementById(`form-${grupoId}`);
      const toggleBtn = document.getElementById(`toggleBtn-${grupoId}`);
      
      if (form.classList.contains('collapsed')) {
        form.classList.remove('collapsed');
        toggleBtn.innerHTML = '<i class="bi bi-dash-circle me-1"></i> Ocultar Formulario';
      } else {
        form.classList.add('collapsed');
        toggleBtn.innerHTML = '<i class="bi bi-plus-circle me-1"></i> Añadir Nueva Asignatura';
      }
    }

    // Enhanced Delete Confirmation
    function confirmDelete(button) {
      const form = button.closest('form');
      const asignaturaName = form.closest('tr').querySelector('td:nth-child(2)').textContent;
      
      if (confirm(`¿Eliminar la asignatura "${asignaturaName}"?`)) {
        // Add loading state
        const originalHtml = button.innerHTML;
        button.innerHTML = '<i class="bi bi-hourglass-split"></i>';
        button.disabled = true;
        
        setTimeout(() => {
          form.submit();
        }, 500);
      }
    }

    // Form Submission Handling
    document.addEventListener('DOMContentLoaded', function() {
      // Add loading states to forms
      const forms = document.querySelectorAll('form');
      forms.forEach(form => {
        form.addEventListener('submit', function(e) {
          const submitBtn = this.querySelector('button[type="submit"]');
          if (submitBtn) {
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Procesando...';
            submitBtn.disabled = true;
            
            // Re-enable after 5 seconds in case of error
            setTimeout(() => {
              submitBtn.innerHTML = originalText;
              submitBtn.disabled = false;
            }, 5000);
          }
        });
      });
    });

    // Auto-expand form when in gestion mode and no data
    document.addEventListener('DOMContentLoaded', function() {
      // If gestion mode is active and no asignaturas, auto-expand form
      const gestionActive = !document.querySelector('.gestion-form').classList.contains('d-none');
      
      if (gestionActive) {
        document.querySelectorAll('.card').forEach(card => {
          const asignaturaCount = card.querySelector('.badge-turquesa').textContent;
          if (asignaturaCount === '0') {
            const grupoId = card.querySelector('form').id.replace('form-', '');
            toggleAddForm(grupoId);
          }
        });
      }
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
      // Ctrl + G to toggle gestión mode
      if (e.ctrlKey && e.key === 'g') {
        e.preventDefault();
        toggleGestion();
      }
    });
  </script>
</body>
</html>