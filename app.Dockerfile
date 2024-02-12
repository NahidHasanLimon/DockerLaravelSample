FROM php:8.1-fpm-alpine

# Setup Working Dir
WORKDIR /var/www

# Add Build Dependencies
RUN apk update && apk add --no-cache \
    libzip-dev \
    libmcrypt-dev \
    libjpeg-turbo-dev \
    libjpeg-turbo \
    jpeg-dev \
    libpng-dev \
    libxml2-dev \
    bzip2-dev \
    libwebp-dev \
    zip \
    jpegoptim \
    pngquant \
    optipng \
    icu-dev \
    freetype-dev \
    zlib-dev \
    curl-dev \
    git \
    vim \
    linux-headers \
    autoconf \
    gcc \
    g++ \
    make \ 
    tzdata \
    nano 

# Configure Time
ENV TZ=Asia/Dhaka

# Install MongoDB Extension
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Configure & Install Docker PHP Extensions
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ \
    && docker-php-ext-install -j "$(nproc)" \
        gd \
        opcache \
        zip \
        pdo \
        pdo_mysql \
        sockets \
        intl

# Add Composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer


# Copy your Laravel application code into the container
COPY . /var/www

RUN composer install

RUN apk add --no-cache docker-compose
