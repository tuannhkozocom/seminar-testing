FROM php:8.0-fpm as base

WORKDIR /var/www

# Install dependencies
RUN apt-get update \
    && apt-get install -y zlib1g-dev libzip-dev libpng-dev mariadb-client git \
    && docker-php-ext-install pcntl zip pdo_mysql gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application -> then assign default to www
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# COPY --chown=www:www . /var/www

# Change current user to www
USER www

COPY . /var/www

EXPOSE 9000
# CMD ["php-fpm"]