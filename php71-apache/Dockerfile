FROM php:7.1-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
        libxml2-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        #libpng12-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli zip soap \
    && docker-php-ext-enable opcache \
    && apt install -y libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && rm -rf /var/lib/apt/lists/*

RUN curl -s https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

COPY php71-apache/config/ $PHP_INI_DIR/conf.d/

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data

RUN usermod -u 1007 $APACHE_RUN_USER \
    && groupmod -g 1007 $APACHE_RUN_GROUP \
    && chown -R "$APACHE_RUN_USER:$APACHE_RUN_GROUP" /var/www

WORKDIR /var/www/html

#USER www-data

EXPOSE 80 443