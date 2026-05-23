<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Sistema de Admisión CUP</title>
    
    <!-- Vinculación del CSS tradicional de Laravel -->
    <link rel="stylesheet" href="{{ asset('css/admision.css') }}">
    
    <!-- Metatags SEO -->
    <meta name="description" content="Dashboard inicial del Sistema de Admisión CUP.">
</head>
<body>

    <div class="dashboard-layout">
        
        <!-- Header / Navbar -->
        <header class="dashboard-header">
            <div style="display: flex; flex-direction: column;">
                <h1 class="brand-logo" style="margin: 0; font-size: 1.8rem;" id="dashboard-brand-title">CUP ADMISIÓN</h1>
                <span style="font-size: 0.8rem; color: var(--color-text-muted); font-weight: 300;">Panel de Control Administrativo</span>
            </div>

            <!-- Perfil del usuario & Botón de Cerrar Sesión -->
            <div style="display: flex; align-items: center; gap: 24px;" id="dashboard-user-actions">
                <div class="user-profile">
                    <div class="user-avatar" title="{{ session('user_email') }}">
                        {{ strtoupper(substr(session('user_name', 'U'), 0, 2)) }}
                    </div>
                    <div class="user-info-text">
                        <span class="user-name" id="display-user-name">{{ session('user_name', 'Usuario') }}</span>
                        <span class="user-role">Administrador</span>
                    </div>
                </div>

                <!-- Formulario de Logout (Seguro mediante POST) -->
                <form action="{{ route('logout') }}" method="POST" id="logout-form-element">
                    @csrf
                    <button type="submit" class="btn-secondary" id="btn-logout-submit">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        </header>

        <!-- Contenido principal -->
        <main class="dashboard-content">
            
            <!-- Banner de bienvenida -->
            <section class="welcome-banner" id="welcome-banner-section">
                <h2 class="welcome-title">¡Bienvenido al Sistema de Admisión CUP!</h2>
                <p class="welcome-desc">
                    Has iniciado sesión correctamente bajo la simulación de archivos de Laravel. Este módulo te permite probar y estructurar toda la experiencia del portal antes de realizar integraciones directas con PostgreSQL.
                </p>
                <div style="margin-top: 15px; font-size: 0.85rem; color: var(--color-text-muted);">
                    <strong>Sesión Activa:</strong> {{ session('user_email') }} | <strong>Fecha de Ingreso:</strong> {{ session('login_time') }}
                </div>
            </section>

            <!-- Grid de estadísticas e información inicial -->
            <section class="stats-grid" id="stats-grid-section">
                
                <!-- Tarjeta 1 -->
                <div class="stat-card" id="stat-card-applicants">
                    <div class="stat-title">Postulantes Registrados</div>
                    <div class="stat-value" style="color: var(--color-primary);">1,248</div>
                    <p class="stat-desc">Estudiantes preinscritos en el período actual.</p>
                </div>

                <!-- Tarjeta 2 -->
                <div class="stat-card" id="stat-card-exams">
                    <div class="stat-title">Exámenes Activos</div>
                    <div class="stat-value" style="color: var(--color-accent);">4</div>
                    <p class="stat-desc">Pruebas programadas de admisión técnica y general.</p>
                </div>

                <!-- Tarjeta 3 -->
                <div class="stat-card" id="stat-card-careers">
                    <div class="stat-title">Carreras Ofertadas</div>
                    <div class="stat-value" style="color: #a855f7;">12</div>
                    <p class="stat-desc">Programas de pregrado habilitados para postulación.</p>
                </div>

            </section>

        </main>

    </div>

</body>
</html>
