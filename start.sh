#!/usr/bin/env bash
echo "Running composer"

composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Publishing cloudinary provider..."
php artisan vendor:publish 

echo "Running migrations..."
php artisan migrate --force

echo "Running seeders..."
php artisan db:seed --force

echo "Running npm"
npm install
npm run prod