FROM php:8.3-cli

# Sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /src

# Copiamos solo lo necesario para instalar deps (cache friendly)
COPY ./src/composer.json ./src/composer.lock ./

# Instalamos dependencias
RUN composer install \
    --no-interaction \
    --no-progress \
    --prefer-dist

# Copiamos el resto del código
COPY ./src .

# Servidor HTTP (DEV)
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
