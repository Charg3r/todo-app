# todo-app-laravel

## Project setup
```
composer install
```
## Setup .env file and create database schema
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=root
DB_PASSWORD=
```
## Generate application key
```
php artisan key:generate
```
### Make migrations and databse seeds
```
php artisan migrate --seed
```

### Compiles and hot-reloads for development
```
php artisan serve
```
