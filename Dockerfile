FROM php:8.3-zts-alpine

WORKDIR /var/www

RUN apk add --no-cache \
    curl \
    git \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    icu-dev \
    libzip-dev \
    zip \
    unzip \
    oniguruma-dev \
    nodejs \
    npm

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd intl pdo pdo_mysql mbstring exif pcntl bcmath opcache zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install

RUN npm install sass --save-dev --legacy-peer-deps

RUN npm run prod

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 8000

USER www-data

ENTRYPOINT ["entrypoint.sh"]
