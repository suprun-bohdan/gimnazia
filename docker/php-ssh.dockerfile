FROM php:7.4-fpm

RUN apt update && apt install -y \
    openssh-server sudo unzip curl git \
    && mkdir /var/run/sshd

# Створення користувача
RUN useradd -ms /bin/bash gimnazia && \
    echo 'gimnazia:gimnazia123' | chpasswd && \
    adduser gimnazia sudo

# Права для Laravel
WORKDIR /var/www
COPY . /var/www

RUN mkdir -p storage/logs bootstrap/cache && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 22

CMD service ssh start && php-fpm
