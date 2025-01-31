\#!/bin/bash
set -e

echo "Deployment started ..."

# Войти в режим обслуживания или вернуть true
# если уже в режиме обслуживания
(php artisan down) || true

# Загрузить последнюю версию приложения
#git pull origin production

# Установить зависимости Composer
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Очистить старый кэш
php artisan clear-compiled

# Пересоздать кэш
php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan config:cache
php artisan optimize
#php artisan route:cache

export NODE_OPTIONS=--openssl-legacy-provider

# Скомпилировать ресурсы
npm run prod

# Запустить миграцию базы данных
php artisan migrate --force
#php artisan db:seed --class=DatabaseSeeder

php artisan key:generate

# Выход из режима обслуживания
php artisan up
php artisan route:clear
echo "Deployment finished!"
