FROM php:8.3-apache

ENV DEBIAN_FRONTEND=noninteractive

# Install dependensi sistem
RUN apt-get update && apt-get install -y \
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

# Install Composer dari image Composer resmi
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set ServerName untuk Apache untuk menghilangkan peringatan
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Set direktori kerja
WORKDIR /var/www/html

# Salin file composer.json, composer.lock, dan artisan terlebih dahulu
COPY composer.json composer.lock artisan ./

# Salin direktori bootstrap dan lainnya yang diperlukan
COPY bootstrap/ bootstrap/
COPY config/ config/
COPY public/ public/
COPY resources/ resources/
COPY routes/ routes/
COPY storage/ storage/
COPY .env .env

# Jalankan composer install
RUN composer install --prefer-dist --no-dev --optimize-autoloader

# Salin file package.json dan package-lock.json
COPY package.json ./

# Install dependensi Node.js
RUN npm install

# Salin seluruh kode proyek (jika belum disalin sebelumnya)
COPY . .

# Build aset menggunakan Laravel Mix
RUN npm run production

# Generate autoload files dan mengoptimalkan
RUN composer dump-autoload --optimize

# Set izin direktori storage, bootstrap/cache, dan public
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Pastikan DirectoryIndex mencakup index.php
RUN echo 'DirectoryIndex index.php index.html' >> /etc/apache2/apache2.conf

# Salin konfigurasi Virtual Host Apache
COPY ./docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Jalankan Apache di foreground
CMD ["apache2-foreground"]
