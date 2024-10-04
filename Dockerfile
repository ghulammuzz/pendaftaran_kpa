FROM php:8.3-apache

RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    npm \
    nodejs 

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd intl pdo pdo_mysql mbstring exif pcntl bcmath opcache zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js (jika belum terinstal)
# RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
#     apt-get install -y nodejs

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install --prefer-dist --no-dev --no-autoloader --no-scripts

COPY package.json ./
RUN npm install

COPY . .

RUN composer dump-autoload --optimize

RUN npm run production

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]
