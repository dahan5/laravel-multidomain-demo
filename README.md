# Laravel Multidomain Demo

## Description

Laravel DDD example for [foxws/laravel-multidomain](https://github.com/foxws/laravel-multidomain) and [foxws/livewire-multidomain](https://github.com/foxws/livewire-multidomain).

## Install

> **NOTE:**  When using Laravel Sail, perform the commands in the `sail shell`.

```bash
cp .env.example .env
composer install
npm install
npm run dev
php artisan key:generate
php artisan storage:link
php artisan app:install
php artisan app:sync
```

## Testing

To test the application:

```bash
php artisan test
```

## Command Overview

| Command | Description |
| - | - |
| php artisan test | Run tests and setup test environment. |
| php artisan app:install | Installs the application. |
| php artisan app:update | Updates the applications (migrations, indexes, etc.). |
| php artisan app:sync | Synces the application. |
| npm run dev | Runs the Vite watcher. |
| npm run build | Runs the Vite builder. |

## Tinker

The following commands may be useful when using Laravel Tinker.

| Command | Description |
| - | - |
| App\Core\Models\Tenant::first()->makeCurrent(); | Makes first tenant the current. Needs to be run to allow Facade interaction. |
