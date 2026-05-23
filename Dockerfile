FROM php:8.2-cli-alpine

# Instalar dependencias del sistema y extensiones de PHP necesarias para PostgreSQL
RUN apk update && apk add --no-cache \
    postgresql-dev \
    bash \
    git \
    unzip \
    libpng-dev \
    libxml2-dev \
    zip

RUN docker-php-ext-install pdo pdo_pgsql pgsql gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /var/www

# Copiar archivos del proyecto
COPY . /var/www

# Instalar dependencias del proyecto
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Dar permisos a directorios de Laravel
RUN chmod -R 777 storage bootstrap/cache

# Exponer el puerto de desarrollo de php artisan serve
EXPOSE 8000

# Comando por defecto para iniciar el servidor integrado de Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
