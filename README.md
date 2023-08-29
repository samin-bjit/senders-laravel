

## About This app

This app is for coding task. This project is dockerized. To run this project, follow below instruction.

## How to run this project

- Clone project from gitlab repository.
- Open terminal into project root.
- Run this command "docker compose build"
- Next run this command "docker compose up"
- Open another terminal
- Next run this command "docker exec -it sender_app sh" 
- Next run this command "composer install"
- Next run this command "cp .env.example .env"
- Next run this command "php artisan key:generate"
- Next open .env file and set this env values.

```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=senders
DB_USERNAME=postgres
DB_PASSWORD=postgres

CACHE_DRIVER=redis
REDIS_CLIENT=predis
REDIS_HOST=sender_redis
REDIS_PASSWORD=null
REDIS_PORT=6379

```
- Next run this command "php artisan migrate"
- Next run this command "php artisan db:seed"
- Go to browser and browse localhost:8000
