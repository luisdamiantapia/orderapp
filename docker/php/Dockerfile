FROM php:7.4.13-fpm

ARG UID

# Create user and some useful stuff
RUN adduser appuser
RUN usermod -aG sudo appuser

RUN mkdir /home/appuser/.ssh
RUN chown -R appuser:appuser /home/appuser/
RUN echo "StrictHostKeyChecking no" >> /home/appuser/.ssh/config
RUN echo "export COLUMNS=300" >> /home/appuser/.bashrc
RUN echo "alias sf=/application/www/bin/console" >> /home/appuser/.bashrc

# Install packages and PHP extensions
RUN apt-get update \
    && apt-get install -y git acl openssl openssh-client wget zip vim librabbitmq-dev libssh-dev \
    && apt-get install -y libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip gd soap bcmath sockets opcache \
    #&& pecl install xdebug amqp \
    #&& docker-php-ext-enable --ini-name 05-opcache.ini opcache xdebug amqp
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache

# Install and update composer
RUN curl https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer
RUN composer self-update

# Install PHP-CS-FIXER
RUN wget https://cs.symfony.com/download/php-cs-fixer-v2.phar -O php-cs-fixer
RUN chmod a+x php-cs-fixer
RUN mv php-cs-fixer /usr/local/bin/php-cs-fixer


RUN mkdir -p /application/www

# Config XDEBUG
# COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /application/www
