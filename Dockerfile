FROM php:8.3-fpm-alpine

RUN apt-get update && apt-get install -y \
    nginx \
    php-fpm \
    && mkdir -p /run/php \
    && rm -rf /var/lib/apt/lists/*

COPY data/default.conf /etc/nginx/sites-available/default
COPY data/index.php /var/www/html/index.php

EXPOSE 80

CMD ["sh", "-c", "service php8.4-fpm start && nginx -g 'daemon off;'"]
