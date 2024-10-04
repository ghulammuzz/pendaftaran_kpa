# Stage 1: Build Stage
FROM node:16-alpine AS node_builder

# Set working directory
WORKDIR /app

# Copy package files and install dependencies
COPY package.json package-lock.json ./
RUN npm install

# Copy seluruh kode proyek dan build aset
COPY . .
RUN npm run production

# Stage 2: PHP Composer Install
FROM php:8.3-fpm AS php_builder

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --prefer-dist --no-dev --optimize-autoloader

# Copy aplikasi ke dalam image
COPY . .

# Generate autoload files
RUN composer dump-autoload --optimize

# Set izin
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Stage 3: Final Stage with Nginx
FROM nginx:alpine

# Copy built assets from node_builder
COPY --from=node_builder /app/public /var/www/html/public

# Copy PHP application from php_builder
COPY --from=php_builder /var/www/html /var/www/html

# Copy Nginx configuration
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose port 80
EXPOSE 80

# Set working directory
WORKDIR /var/www/html

# Start Nginx
CMD ["nginx", "-g", "daemon off;"]
