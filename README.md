# Laravel 12 + Vue (Docker Compose Boilerplate)

This repo contains a Docker Compose setup that runs:
- PHP (Laravel) via a PHP-FPM container (no local PHP install)
- MySQL via a MySQL container
- Node/Vite via a Node container (no local Node/npm install)

## What you get
- Nginx + PHP-FPM serving a Laravel app under `./app/`
- MySQL initialized with a `laravel` database/user
- Vue integration via **Laravel Breeze (Vue stack)**, installed inside containers

## Quick Start
From this repo root, run:
```powershell
docker compose up -d
```
On the first run, it will:
- create the Laravel 12 app (if `./app` is missing)
- ensure `app/.env` exists and generate `APP_KEY` if needed
- run `composer install` (only if `vendor/` is missing)
- install Breeze (Vue stack) if not installed yet
- run `php artisan migrate`
- run Vite build once (creates `app/public/build`)

You should be able to open:
- `http://localhost:8080` (Laravel default home page)
- `http://localhost:8080/examples` (Laravel examples)
- `http://localhost:8080/vue-examples` (Vue.js examples)

## If you need to rebuild (Docker changes)
If you change `Dockerfile`/images or the compose setup itself, run:
```powershell
docker compose build
docker compose up -d
```

You can also force rebuild+recreate in one go:
```powershell
docker compose up -d --build
```

Open:
- `http://localhost:8080`

## Running PHPUnit tests
This project includes PHPUnit tests under `app/tests/`.

Run PHPUnit inside the existing Docker `php` container (no local PHP install needed):
```powershell
docker compose run --rm php sh -lc "cd /var/www/html && ./vendor/bin/phpunit"
```

Notes:
- `app/phpunit.xml` config uses `DB_CONNECTION=sqlite` with an in-memory database for fast tests.
- If you see an error about missing SQLite drivers (e.g. `pdo_sqlite`), you will need to enable the SQLite PHP extension in `Dockerfile` and rebuild the images.

## Notes / gotchas
- This setup mounts `./app` into the containers. After scaffolding, the runtime app lives in `./app/`.
- Database connection values are provided via container environment variables (`DB_HOST=mysql`, etc.), so you generally do not need to manually edit `./app/.env` for DB access.

