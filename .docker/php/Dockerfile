FROM php:8.1.9-fpm-alpine
WORKDIR /app

RUN apk update \
    && apk add --no-cache bash vim libzip-dev libpng freetype libjpeg-turbo libpng freetype-dev libjpeg-turbo-dev libpng-dev \
    postgresql-dev \
    $PHPIZE_DEPS \
    tzdata

RUN docker-php-ext-install zip pgsql pdo_pgsql
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd

RUN pecl install redis \
    && docker-php-ext-enable redis \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

COPY /app /app