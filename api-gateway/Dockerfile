FROM php:7.3-fpm-alpine
RUN mkdir -p /var/www/html/api-gateway/
WORKDIR /var/www/html/api-gateway/
COPY . /var/www/html/api-gateway/

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

RUN composer install
