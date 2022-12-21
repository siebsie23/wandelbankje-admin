FROM composer:2.4.4 as build
COPY . /app/
WORKDIR /app
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction

FROM node:19-alpine as node
COPY --from=build /app /app
WORKDIR /app
RUN npm install && npm run build

FROM php:8.1-apache-buster as production

ENV APP_ENV=production
ENV APP_DEBUG=false

RUN docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-install pdo pdo_mysql
COPY docker/php/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

COPY --from=node /app /var/www/html
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY .env.example /var/www/html/.env

RUN php artisan config:cache && \
    php artisan route:cache && \
    chmod -R 755 /var/www/html/storage && \
    chown -R www-data:www-data /var/www/html && \
    a2enmod rewrite
