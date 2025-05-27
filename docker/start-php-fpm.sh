#!/bin/bash
exec /usr/local/sbin/php-fpm --nodaemonize --fpm-config /usr/local/etc/php-fpm.conf >> /var/log/php-fpm.log 2>&1
