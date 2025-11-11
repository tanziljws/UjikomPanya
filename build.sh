#!/bin/bash
set -e

echo "Building Laravel application..."

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Install dependencies
composer install --optimize-autoloader --no-dev

# Generate app key if not exists
if [ -z "$APP_KEY" ]; then
    php artisan key:generate
fi

# Run migrations
php artisan migrate --force

# Install and build frontend assets
npm install
npm run build

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Build completed successfully!"
