FROM php:7.4-apache

USER root

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y --no-install-recommends \
  autoconf \
  build-essential \
  apt-utils \
  zlib1g-dev \
  libzip-dev \
  unzip \
  zip \
  libmagick++-dev \
  libmagickwand-dev \
  libpq-dev \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --enable-gd

RUN docker-php-ext-install mysqli pdo_mysql gd

RUN docker-php-ext-enable gd

RUN pecl install xdebug-3.1.5

RUN docker-php-ext-enable xdebug

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite
