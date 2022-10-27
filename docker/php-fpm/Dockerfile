FROM php:7.4-fpm

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && \
    apt-get -y install \
        gnupg2 && \
    apt-key update && \
    apt-get update && \
    apt-get -y install \
        g++ \
        git \
        curl \
        libcurl3-dev \
        libicu-dev \
        libpq-dev \
        libzip-dev \
        zip \
        unzip \
        zlib1g-dev \
    --no-install-recommends && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN  docker-php-ext-configure bcmath
RUN  docker-php-ext-install \
    zip \
    curl \
    bcmath \
    iconv \
    intl \
    opcache \
    pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer.phar \
    --install-dir=/usr/local/bin && \
    mv /usr/local/bin/composer.phar /usr/local/bin/composer

WORKDIR /var/www/app