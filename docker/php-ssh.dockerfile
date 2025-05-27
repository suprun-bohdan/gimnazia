FROM php:8.1-fpm

# встановлюємо залежності + supervisor
RUN apt update && apt install -y \
    openssh-server sudo unzip curl git zip htop supervisor && \
    mkdir -p /var/run/sshd

# ваші налаштування php
RUN printf "\
memory_limit=128M\n\
upload_max_filesize=25M\n\
post_max_size=30M\n\
" > /usr/local/etc/php/conf.d/custom.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# потрібні розширення для laravel + черг
RUN docker-php-ext-install pdo pdo_mysql exif pcntl \
    && pecl install redis && docker-php-ext-enable redis

# користувачі
RUN id -u gimnazia 2>/dev/null || ( \
    useradd -ms /bin/bash gimnazia && \
    echo 'gimnazia:gimnazia123' | chpasswd && \
    adduser gimnazia sudo )

# php-fpm налаштування
RUN sed -i 's/^pm =.*/pm = ondemand/' /usr/local/etc/php-fpm.d/www.conf && \
    echo "pm.max_children = 2" >> /usr/local/etc/php-fpm.d/www.conf && \
    echo "pm.process_idle_timeout = 10s" >> /usr/local/etc/php-fpm.d/www.conf && \
    echo "clear_env = no" >> /usr/local/etc/php-fpm.d/www.conf && \
    sed -i 's|^listen = .*|listen = 0.0.0.0:9000|' /usr/local/etc/php-fpm.d/www.conf

# копіюємо конфіг supervisor для horizon
COPY docker/supervisor/horizon.conf /etc/supervisor/conf.d/

WORKDIR /var/www

RUN mkdir -p storage/logs bootstrap/cache && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 9000 22

# замінюємо запуск php-fpm+ssh на supervisord
CMD ["supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
