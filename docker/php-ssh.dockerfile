FROM php:8.1-fpm

RUN apt update && apt install -y \
    openssh-server sudo unzip curl git zip htop && \
    mkdir -p /var/run/sshd

RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memlimit.ini

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql exif

RUN id -u gimnazia 2>/dev/null || ( \
    useradd -ms /bin/bash gimnazia && \
    echo 'gimnazia:gimnazia123' | chpasswd && \
    adduser gimnazia sudo )

RUN sed -i 's/^pm =.*/pm = static/' /usr/local/etc/php-fpm.d/www.conf && \
    echo "pm.max_children = 5" >> /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www

RUN mkdir -p storage/logs bootstrap/cache && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 9000 22

RUN sed -i 's|^listen = .*|listen = 0.0.0.0:9000|' /usr/local/etc/php-fpm.d/www.conf

CMD service ssh start && php-fpm
