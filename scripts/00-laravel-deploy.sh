#!/usr/bin/env bash

echo "Instalando dependencias..."
composer install --no-dev --working-dir=/var/www/html

echo "Cacheando config..."
php artisan config:cache

echo "Cacheando rutas..."
php artisan route:cache

echo "Ejecutando migraciones..."
php artisan migrate --force