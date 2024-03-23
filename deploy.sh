#!/bin/bash

composer install
npm run production
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate