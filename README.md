
# Online Order Return System

## This build is based on docker-composed. before running make sure you've install Docker Desktop, or docker engine and compose plugin

## Running local
- make dev-build-no-cache
- make dev-up
- composer install
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- npm i
- npm build
