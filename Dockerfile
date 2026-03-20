FROM php:8.3-fpm-alpine

# Install common PHP extensions required by Laravel.
RUN apk add --no-cache \
    curl \
    icu-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    $PHPIZE_DEPS \
    zip \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    bcmath \
    intl \
    zip \
    gd \
  && apk del $PHPIZE_DEPS

# Install Composer inside the PHP image (so Composer uses the same PHP extensions).
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Laravel-friendly PHP defaults.
COPY php/conf.d/*.ini /usr/local/etc/php/conf.d/

WORKDIR /var/www/html

