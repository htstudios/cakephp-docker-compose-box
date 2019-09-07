FROM alpine:3.10
WORKDIR "/application/http"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apk add --update --upgrade --no-cache \
        bash \
        curl \
        git \
        npm \
        php7 \
        php7-apcu \
        php7-bcmath \
        php7-cli \
        php7-ctype \
        php7-curl \
        php7-dom \
        php7-fileinfo \
        php7-fpm \
        php7-ftp \
        php7-gd \
        php7-iconv \
        php7-intl \
        php7-json \
        php7-mbstring \
        php7-mcrypt \
        php7-memcached \
        php7-opcache \
        php7-openssl \
        php7-pdo \
        php7-pdo_sqlite \
        php7-pdo_pgsql \
        php7-pdo_mysql \
        php7-pear \
        php7-phar \
        php7-posix \
        php7-redis \
        php7-session \
        php7-simplexml \
        php7-tokenizer \
        #php7-pecl-xdebug \
        php7-xdebug \
        php7-xml \
        php7-xmlreader \
        php7-xmlwriter \
        php7-zip \
        php7-zlib

# Install xdebug
#RUN apk add --update --upgrade --no-cache php7-dev alpine-sdk
#RUN apk add --update --upgrade --no-cache --virtual .phpize-deps $PHPIZE_DEPS
#RUN pecl channel-update pecl.php.net && pecl -v install xdebug

# Clean cache
RUN rm -rf /var/cache/apk/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install latest npm and gulp
RUN npm install -g npm@latest \
    && npm install -g gulpjs/gulp-cli \
    && npm install -g gulp

RUN set -x \
    && addgroup -g 82 -S www-data \
    && adduser -u 82 -D -S -G www-data www-data

CMD ["php", "-a"]
