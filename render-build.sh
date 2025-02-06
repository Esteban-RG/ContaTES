#!/usr/bin/env bash

# Instala PHP y Composer en el entorno de Render
curl -fsSL https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Instala dependencias de Laravel
composer install --no-dev --optimize-autoloader
php artisan config:cache
