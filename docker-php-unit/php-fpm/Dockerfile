FROM php:8.2.1-fpm-alpine3.17

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD composer install ;  php-fpm 

EXPOSE 9000
