FROM php:7.2-apache

# Модули Apache
RUN a2enmod rewrite && a2enmod headers

# Модули PHP и гит
RUN apt-get update && apt-get install -y \
        git \
        libxml2-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        #libpng12-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli pdo_mysql zip soap \
    && docker-php-ext-enable opcache \
    && apt install -y libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && rm -rf /var/lib/apt/lists/*

# Composer
RUN curl -s https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

# Конфиги Apache и PHP
COPY ./.docker/php-apache/conf.d/ $PHP_INI_DIR/conf.d/
COPY ./.docker/php-apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Пользователь Apache
ARG APACHE_RUN_USER=www-data
ENV APACHE_RUN_USER $APACHE_RUN_USER
ARG APACHE_RUN_GROUP=www-data
ENV APACHE_RUN_GROUP $APACHE_RUN_GROUP
ARG APACHE_USER_ID=33
ENV APACHE_USER_ID $APACHE_USER_ID
ARG APACHE_GROUP_ID=33
ENV APACHE_GROUP_ID $APACHE_GROUP_ID

RUN usermod -u $APACHE_USER_ID $APACHE_RUN_USER \
    && groupmod -g $APACHE_GROUP_ID $APACHE_RUN_GROUP \
    && chown -R "$APACHE_RUN_USER:$APACHE_RUN_GROUP" /var/www

# Файлы проекта
COPY --chown=${APACHE_RUN_USER}:${APACHE_RUN_GROUP} . /var/www/html

# Скрипт сборки
USER $APACHE_RUN_USER
WORKDIR /var/www/html
ARG RUN_BUILD_SCRIPT=true

RUN if [ $RUN_BUILD_SCRIPT = true ]; then \
    chmod +x ./.docker/php-apache/build.sh && ./.docker/php-apache/build.sh \
; fi

# Запуск контейнера
USER root
WORKDIR /var/www/html
EXPOSE 80