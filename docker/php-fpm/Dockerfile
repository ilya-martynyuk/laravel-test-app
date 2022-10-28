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

# nvm environment variables
ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 16.13.0

RUN mkdir $NVM_DIR
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
RUN . $NVM_DIR/nvm.sh && nvm install node
RUN . $NVM_DIR/nvm.sh && nvm alias default $NODE_VERSION
RUN . $NVM_DIR/nvm.sh && nvm use default

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

RUN useradd -G www-data,root -u 1000 -d /home/laravel laravel
RUN mkdir -p /var/www/app && \
    chown -R laravel:laravel /var/www/app

USER laravel
WORKDIR /var/www/app