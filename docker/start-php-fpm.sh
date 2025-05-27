#!/bin/bash
exec /usr/local/sbin/php-fpm --nodaemonize --fpm-config /usr/local/etc/php-fpm.conf --error-log /var/log/php-fpm.log
