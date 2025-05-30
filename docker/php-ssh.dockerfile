FROM php:8.1-fpm

RUN apt update && apt install -y \
    openssh-server sudo unzip curl git zip htop supervisor && \
    mkdir -p /var/run/sshd

# додати користувача www-data, якщо його немає
RUN id www-data 2>/dev/null || (groupadd -g 33 www-data && useradd -u 33 -g www-data -s /usr/sbin/nologin www-data)

# composer
RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer

# php розширення
RUN docker-php-ext-install pdo pdo_mysql exif pcntl \
    && pecl install redis && docker-php-ext-enable redis

# налаштування php-fpm
RUN sed -i 's|^listen = .*|listen = 0.0.0.0:9000|' /usr/local/etc/php-fpm.d/www.conf \
 && sed -i 's|^;*error_log = .*|error_log = /var/log/php-fpm.log|' /usr/local/etc/php-fpm.d/www.conf \
 && sed -i 's|^user = .*|user = www-data|' /usr/local/etc/php-fpm.d/www.conf \
 && sed -i 's|^group = .*|group = www-data|' /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www

RUN mkdir -p /var/run /var/log && chmod 755 /var/run && touch /var/log/php-fpm.log && chmod 666 /var/log/php-fpm.log

RUN mkdir -p storage/logs bootstrap/cache && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 storage bootstrap/cache

COPY docker/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
COPY docker/supervisor/conf.d/ /etc/supervisor/conf.d/
COPY docker/start-php-fpm.sh /usr/local/bin/start-php-fpm.sh
RUN chmod +x /usr/local/bin/start-php-fpm.sh

EXPOSE 9000 22

CMD ["supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
