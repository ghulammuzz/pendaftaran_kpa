#!/bin/sh

php artisan serve --host=0.0.0.0 --port=8000 &

sleep 10

php artisan storage:link
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

tail -f /dev/null