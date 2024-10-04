# Menggunakan image PHP yang sesuai
FROM php:8.3-fpm

# Menginstal ekstensi yang diperlukan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip

# Instal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /app

# Menyalin file composer dan install dependensi PHP
COPY composer.json composer.lock ./
RUN composer install --no-autoloader --no-scripts

# Menyalin file aplikasi
COPY . .

# Install dependensi Node.js dan build aset
RUN npm install && npm run prod

# Jalankan composer autoload
RUN composer dump-autoload

# Expose port yang diperlukan (misalnya 9000)
EXPOSE 9000

# Menjalankan php-fpm
CMD ["php-fpm"]
