#!/usr/bin/env bash
echo "Running entrypoint script..."

set -e

# make sure Laravel can write its own files
mkdir -p /var/www/html/storage/logs/
touch /var/www/html/storage/logs/laravel.log
touch /var/www/html/storage/logs/worker.log
chown www-data:www-data -R /var/www/html/storage
chown www-data:www-data -R /var/www/html/bootstrap/cache

cd /var/www/html

# create storage symlink
echo "create storage symlink..."
su www-data -s /bin/sh -c "php artisan storage:link -q"

exec "$@"
