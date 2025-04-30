FROM php:8.3-apache

# Install required packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    libzip-dev \
    libmagickwand-dev \
    imagemagick \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
        --with-xpm \
    && docker-php-ext-install -j$(nproc) gd zip \
    && pecl install imagick || true \
    && docker-php-ext-enable imagick

# Enable Apache mod_rewrite
RUN a2enmod rewrite
