# Stage 1: Build assets
FROM node:16 as node

WORKDIR /app

COPY package.json ./
RUN npm install

COPY webpack.mix.js ./
COPY resources ./resources

RUN npm run prod

# Stage 2: Setup PHP and serve
FROM php:8.3-fpm

WORKDIR /var/www

COPY --from=node /app/public /var/www/public
COPY . .

RUN composer install --optimize-autoloader --no-dev

# Set permissions, etc.

CMD ["php-fpm"]
