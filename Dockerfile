FROM php:8.3-apache

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    npm \
    nodejs \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
    
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
