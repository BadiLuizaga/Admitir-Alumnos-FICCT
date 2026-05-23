<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión - Sistema de Admisión CUP</title>
    
    <!-- Vinculación del CSS tradicional de Laravel -->
    <link rel="stylesheet" href="{{ asset('css/admision.css') }}">
    
    <!-- Metatags SEO -->
    <meta name="description" content="Portal de inicio de sesión seguro para el Sistema de Admisión CUP de la Universidad.">
</head>
<body>

    <main class="auth-container">
        <div class="glass-card">
            
            <!-- Cabecera de Login -->
            <div class="card-header">
                <h1 class="brand-logo" id="main-brand-title">CUP ADMISIÓN</h1>
                <p class="card-subtitle">Ingresa tus credenciales para acceder al sistema</p>
            </div>

            <!-- Alertas y Mensajes de sesión -->
            @if(session('error'))
                <div class="alert alert-error" id="alert-error-session">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-success" id="alert-info-session" style="background: rgba(14, 165, 233, 0.15); color: #0ea5e9; border-color: rgba(14, 165, 233, 0.3);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    <span>{{ session('info') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error" id="alert-validation-errors">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <div style="display: flex; flex-direction: column;">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Formulario de Acceso -->
            <form action="{{ route('login.post') }}" method="POST" id="login-form-element">
                @csrf
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <div class="input-wrapper">
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-input" 
                            placeholder="nombre@correo.com" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="username"
                        >
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-wrapper">
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-input" 
                            placeholder="••••••••" 
                            required 
                            autocomplete="current-password"
                        >
                    </div>
                </div>

                <!-- Botón de Ingreso -->
                <button type="submit" class="btn-primary" id="btn-login-submit">
                    <span>Acceder al Sistema</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
            </form>

        </div>
    </main>

</body>
</html>
