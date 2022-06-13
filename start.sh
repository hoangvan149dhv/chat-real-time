#!/usr/bin/env bash
composer install

npm install
npm run prod

cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=DatabaseSeeder

php-fpm & /usr/bin/supervisord
