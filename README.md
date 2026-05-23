# 🎓 Sistema de Admisión - FICCT

Bienvenido al sistema de admisión web para el **CUP**. Este proyecto está construido con **Laravel 11**, enfocado en una experiencia de usuario premium, un diseño 100% responsive y una arquitectura sólida basada en estilos puros.

---

## 🚀 Guía de Instalación para Colaboradores

Si acabas de clonar el repositorio, sigue estos pasos para configurar tu entorno local:

### 1. Instalar dependencias

Asegúrese de tener PHP y Composer instalados. Luego ejecuta:

```bash
composer install
```
### 2. Configurar el archivo de entorno

Copia el archivo de ejemplo y configura tus credenciales de base de datos en el nuevo archivo

```bash
cp .env.example .env
```

### 3. Generar clave de aplicación

Ejecuta este comando para establecer la clave de encriptación del sistema en tu entorno local:

```bash
php artisan key:generate
```
### 4. Levantar el servidor de desarrollo

Para encender la página de forma local, ejecuta el comando nativo de Laravel:

```bash
php artisan serve
```
