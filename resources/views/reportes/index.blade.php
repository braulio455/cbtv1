<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reportes - Filtros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --vino-claro: #B76E79;
            --vino: #9A4C5F;
            --vino-oscuro: #7A3A4A;
            --dorado: #D4AF37;
            --dorado-oscuro: #B8941F;
            --dorado-claro: #F8F2E6;
            --crema: #FDF8F5;
            --radius: 0;
            --shadow: 0 4px 20px rgba(154, 76, 95, 0.1);
            --shadow-hover: 0 8px 30px rgba(154, 76, 95, 0.15);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            border-radius: 0 !important;
        }

        body {
            background: linear-gradient(135deg, var(--crema) 0%, #ffffff 100%);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            color: #5A4A4E;
            min-height: 100vh;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-container {
            max-width: 800px;
            width: 100%;
            padding: 2rem;
        }

        .card {
            border: 1px solid #e8e1e3;
            background: white;
            box-shadow: var(--shadow);
            transition: var(--transition);
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
            background: linear-gradient(to bottom, var(--vino-claro), var(--dorado));
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .card-header {
            background: linear-gradient(135deg, #f9f2f4 0%, white 100%);
            border-bottom: 2px solid #f9f2f4;
            padding: 1.5rem 2rem;
            font-weight: 700;
            color: var(--vino);
            font-size: 1.25rem;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border: 2px solid #e8e1e3;
            padding: 0.75rem 1rem;
            transition: var(--transition);
            font-size: 0.95rem;
            background: white;
            color: #5A4A4E;
        }

        .form-control:focus {
            border-color: var(--dorado);
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: var(--vino);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .btn-vino {
            background: linear-gradient(135deg, var(--vino-claro) 0%, var(--vino) 100%);
            color: white;
            font-weight: 600;
            border: none;
            padding: 0.75rem 2rem;
            transition: var(--transition);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .btn-vino:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
            color: white;
            background: linear-gradient(135deg, var(--vino) 0%, var(--vino-oscuro) 100%);
        }

        .btn-vino::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s;
        }

        .btn-vino:hover::before {
            left: 100%;
        }

        .form-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--vino-claro);
            z-index: 5;
        }

        .form-group {
            position: relative;
        }

        .form-control.with-icon {
            padding-left: 3rem;
        }

        .header-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--vino-claro);
        }

        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .quick-stats {
            background: linear-gradient(135deg, var(--vino-claro) 0%, var(--vino) 100%);
            color: white;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--dorado);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            text-align: center;
        }

        .stat-item {
            padding: 0.5rem;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }
            
            .btn-vino {
                padding: 0.75rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="card fade-in">
            <div class="card-header text-center">
                <div class="header-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h2 class="mb-0">Sistema de Reportes</h2>
                <p class="mb-0 text-muted mt-1">Filtros de búsqueda avanzada</p>
            </div>
            
            <div class="card-body">
                <!-- Quick Stats -->
                <div class="quick-stats">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-number" id="totalInscripciones">1,247</div>
                            <div class="stat-label">Inscripciones</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" id="totalAsistencias">8,956</div>
                            <div class="stat-label">Asistencias</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" id="totalDocentes">42</div>
                            <div class="stat-label">Docentes</div>
                        </div>
                    </div>
                </div>

                <!-- Filter Form -->
                <form action="{{ route('reportes.filtrar') }}" method="GET" id="filterForm">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Tipo de Reporte</label>
                            <div class="form-group">
                                <i class="fas fa-chart-pie form-icon"></i>
                                <select name="tipo" id="tipo" class="form-control with-icon" required>
                                    <option value="">Seleccione un tipo de reporte</option>
                                    <option value="inscripciones">📋 Inscripciones</option>
                                    <option value="asistencias">✅ Asistencias</option>
                                    <option value="docentes">👨‍🏫 Docentes</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Ciclo Académico</label>
                            <div class="form-group">
                                <i class="fas fa-calendar-alt form-icon"></i>
                                <select name="ciclo" id="ciclo" class="form-control with-icon">
                                    <option value="">Todos los ciclos</option>
                                    <option value="intensivo">🔥 Intensivo</option>
                                    <option value="ordinarioI">📚 Ordinario I</option>
                                    <option value="ordinarioII">🎓 Ordinario II</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">DNI (Búsqueda específica)</label>
                            <div class="form-group">
                                <i class="fas fa-id-card form-icon"></i>
                                <input type="text" name="dni" id="dni" class="form-control with-icon" 
                                       placeholder="Ingrese 8 dígitos" maxlength="8"
                                       pattern="[0-9]{8}" title="Ingrese 8 dígitos numéricos">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex gap-2 flex-wrap justify-content-center">
                                <button type="submit" class="btn btn-vino" id="submitBtn">
                                    <i class="fas fa-search me-2"></i> Generar Reporte
                                </button>
                                <button type="button" class="btn btn-outline-secondary" onclick="resetForm()">
                                    <i class="fas fa-undo me-2"></i> Limpiar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="card mt-4 fade-in" style="animation-delay: 0.2s;">
            <div class="card-header">
                <i class="fas fa-bolt me-2"></i> Acciones Rápidas
            </div>
            <div class="card-body py-3">
                <div class="row g-2">
                    <div class="col-md-4">
                        <button class="btn btn-outline-vino w-100" onclick="setQuickFilter('inscripciones', 'intensivo')">
                            <i class="fas fa-fire me-2"></i> Inscripciones Intensivo
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-vino w-100" onclick="setQuickFilter('asistencias', '')">
                            <i class="fas fa-calendar-check me-2"></i> Asistencias
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-outline-vino w-100" onclick="setQuickFilter('docentes', '')">
                            <i class="fas fa-users me-2"></i> Todos los Docentes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation
            const filterForm = document.getElementById('filterForm');
            filterForm.addEventListener('submit', function(e) {
                const tipo = document.getElementById('tipo').value;
                if (!tipo) {
                    e.preventDefault();
                    showNotification('Por favor seleccione un tipo de reporte', 'warning');
                    document.getElementById('tipo').focus();
                    return;
                }

                // Add loading state
                const submitBtn = document.getElementById('submitBtn');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<div class="loading me-2"></div> Procesando...';
                submitBtn.disabled = true;

                // Re-enable after 5 seconds in case of error
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 5000);
            });

            // DNI input validation
            const dniInput = document.getElementById('dni');
            dniInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 8);
                
                // Visual feedback
                if (this.value.length === 8) {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                } else if (this.value.length > 0) {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                } else {
                    this.classList.remove('is-valid', 'is-invalid');
                }
            });

            // Real-time validation for select
            const tipoSelect = document.getElementById('tipo');
            tipoSelect.addEventListener('change', function() {
                if (this.value) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                }
            });

            // Add hover effects to cards
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });

        function setQuickFilter(tipo, ciclo) {
            document.getElementById('tipo').value = tipo;
            document.getElementById('ciclo').value = ciclo;
            document.getElementById('dni').value = '';
            
            // Show validation state
            document.getElementById('tipo').classList.add('is-valid');
            
            showNotification(`Filtro aplicado: ${getTipoNombre(tipo)} ${ciclo ? '- ' + getCicloNombre(ciclo) : ''}`, 'success');
        }

        function resetForm() {
            document.getElementById('filterForm').reset();
            
            // Clear validation states
            const inputs = document.querySelectorAll('.is-valid, .is-invalid');
            inputs.forEach(input => {
                input.classList.remove('is-valid', 'is-invalid');
            });
            
            showNotification('Formulario restablecido', 'info');
        }

        function getTipoNombre(tipo) {
            const tipos = {
                'inscripciones': 'Inscripciones',
                'asistencias': 'Asistencias',
                'docentes': 'Docentes'
            };
            return tipos[tipo] || tipo;
        }

        function getCicloNombre(ciclo) {
            const ciclos = {
                'intensivo': 'Intensivo',
                'ordinarioI': 'Ordinario I',
                'ordinarioII': 'Ordinario II'
            };
            return ciclos[ciclo] || ciclo;
        }

        function showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(notification);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 5000);
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl + 1 for inscripciones
            if (e.ctrlKey && e.key === '1') {
                e.preventDefault();
                setQuickFilter('inscripciones', '');
            }
            // Ctrl + 2 for asistencias
            if (e.ctrlKey && e.key === '2') {
                e.preventDefault();
                setQuickFilter('asistencias', '');
            }
            // Ctrl + 3 for docentes
            if (e.ctrlKey && e.key === '3') {
                e.preventDefault();
                setQuickFilter('docentes', '');
            }
            // Ctrl + R to reset
            if (e.ctrlKey && e.key === 'r') {
                e.preventDefault();
                resetForm();
            }
        });

        // Add CSS for validation states
        const style = document.createElement('style');
        style.textContent = `
            .is-valid {
                border-color: #28a745 !important;
                box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25) !important;
            }
            .is-invalid {
                border-color: #dc3545 !important;
                box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
            }
            .btn-outline-vino {
                border: 2px solid var(--vino-claro);
                color: var(--vino);
                font-weight: 600;
                background: transparent;
                padding: 0.6rem 1.25rem;
                transition: var(--transition);
            }
            .btn-outline-vino:hover {
                background: var(--vino-claro);
                color: white;
                transform: translateY(-2px);
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>