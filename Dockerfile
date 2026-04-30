FROM php:8.4-cli

WORKDIR /app

# 必要パッケージ
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libpq-dev \
    nodejs npm

# PHP拡張
RUN docker-php-ext-install pdo pdo_pgsql mbstring

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# アプリコピー
COPY . .

# Laravel依存
RUN composer install --no-dev --optimize-autoloader

# Viteビルド
RUN npm install && npm run build

# 権限
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

# 重複しないSeeder前提
CMD php artisan config:clear && \
    php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan serve --host=0.0.0.0 --port=10000