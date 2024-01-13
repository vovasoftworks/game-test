
# 1. Сборка Docker-образа
docker-compose build app

# 2. Запуск контейнеров в фоновом режиме
docker-compose up -d

# 3. Ожидание контейнера MySQL, чтобы убедиться, что он полностью запущен (опционально)

docker-compose exec -T mysql /bin/sh -c 'while ! mysqladmin ping -h"localhost" --silent; do sleep 1; done;'

# 4. Обновление зависимостей Laravel с использованием Composer
docker-compose exec app composer update laravel/framework

# 5. Установка зависимостей Laravel с использованием Composer
docker-compose exec app composer install

# 6. Генерация ключа приложения Laravel
docker-compose exec app php artisan key:generate

# 7. Выполнение миграций Laravel
docker-compose exec app php artisan migrate




