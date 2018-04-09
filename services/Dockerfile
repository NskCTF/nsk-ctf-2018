# see https://github.com/cmaessen/docker-php-sendmail for more information

FROM php:7.1-fpm-alpine
RUN docker-php-ext-install mysqli pdo pdo_mysql

# RUN docker-php-ext-install mysql mysqli

RUN echo "localhost localhost.localdomain" >> /etc/hosts
