#!/bin/bash

git pull origin master
composer install
php artisan migrate
php artisan passport:install
