FROM php:8.3-fpm

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiamos dependencias primero (cache eficiente)
COPY app/composer.json app/composer.lock ./
RUN composer install --no-interaction --prefer-dist

# Copiamos el resto
COPY app/ .

RUN composer dump-autoload --optimize

CMD ["php-fpm"]
