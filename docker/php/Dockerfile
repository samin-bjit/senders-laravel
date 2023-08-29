# Set master image
FROM php:7.2-fpm-alpine


# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Install Additional dependencies
RUN apk update && apk add --no-cache \
    build-base shadow vim curl \
    php7 \
    php7-fpm \
    php7-common \
    php7-pdo \
    php7-pdo_mysql \
    php7-pgsql \
    php7-pdo_pgsql \
    php7-mysqli \
    php7-mcrypt \
    php7-mbstring \
    php7-xml \
    php7-openssl \
    php7-json \
    php7-phar \
    php7-zip \
    php7-gd \
    php7-dom \
    php7-session \
    php7-zlib \
    php7-imagick \
    freetype-dev \
    git \
    libjpeg-turbo-dev \
    libzip-dev \
    openssh-client \
    php7-pcntl

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-configure gd \
        --with-freetype-dir=/usr/include/freetype2 \
        --with-png-dir=/usr/include \
        --with-jpeg-dir=/usr/include \
    && docker-php-ext-install gd \
    && docker-php-ext-enable gd



# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-enable pdo_pgsql

# RUN apk --update add --virtual build-dependencies build-base openssl-dev autoconf \
#   && pecl install mongodb \
#   && docker-php-ext-enable mongodb \
#   && apk del build-dependencies build-base openssl-dev autoconf \
#   && rm -rf /var/cache/apk/*

RUN docker-php-ext-install opcache
RUN docker-php-ext-enable opcache

RUN docker-php-ext-install opcache
RUN docker-php-ext-enable opcache

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Remove Cache
RUN rm -rf /var/cache/apk/*

# Add UID '1000' to www-data
RUN usermod -u 1000 www-data

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/html
COPY docker/php/php.ini /usr/local/etc/php/

# Change current user to www
USER www-data

# RUN COMPOSER_PROCESS_TIMEOUT=3000 composer install

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]