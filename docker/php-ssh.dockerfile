FROM php:8.1-fpm

# базові пакети
RUN apt update && apt install -y \
    openssh-server sudo unzip curl git zip && \
    mkdir -p /var/run/sshd

RUN apt install -y htop

# composer (глобально)
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql exif

# створення користувача
RUN id -u gimnazia 2>/dev/null || ( \
    useradd -ms /bin/bash gimnazia && \
    echo 'gimnazia:gimnazia123' | chpasswd && \
    adduser gimnazia sudo )

# робоча директорія
WORKDIR /var/www

# заготовка для Laravel
RUN mkdir -p storage/logs bootstrap/cache && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 storage bootstrap/cache

# порти
EXPOSE 9000 22

# запуск
CMD service ssh start && php-fpm
