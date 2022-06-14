#!/usr/bin/env bash
composer install

cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
npm install
npm run prod
php-fpm & /usr/bin/supervisord
