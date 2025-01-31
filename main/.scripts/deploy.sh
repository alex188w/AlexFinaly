\#!/bin/bash
set -e
echo "Deployment started ..."
 (php artisan down) || true
# Загрузить последнюю версию приложения
#git pull origin production

composer install
php artisan clear-compiled

php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan config:cache
php artisan optimize
php artisan route:cache

npm run build

php artisan migrate --force
php artisan key:generate
php artisan up
php artisan config:clear
echo "Deployment finished!"

