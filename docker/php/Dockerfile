FROM php:7.2.0-fpm

COPY config/php.ini /usr/local/etc/php/

# see https://github.com/docker-library/php/issues/307
RUN curl -sS -o /tmp/icu.tar.gz -L http://download.icu-project.org/files/icu4c/60.1/icu4c-60_1-src.tgz && \
    tar -zxf /tmp/icu.tar.gz -C /tmp && \
    cd /tmp/icu/source && \
    ./configure --prefix=/usr/local && \
    make && \
    make install

RUN docker-php-ext-configure intl --with-icu-dir=/usr/local && \
    docker-php-ext-install intl

RUN docker-php-ext-enable opcache.so

# install composer
RUN apt-get update && \
    apt-get install -y git unzip
COPY ./composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

WORKDIR /var/www
