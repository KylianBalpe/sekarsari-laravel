#!/bin/bash

php artisan migrate:fresh --seed --force

php artisan serve --host=0.0.0.0 --port=8080