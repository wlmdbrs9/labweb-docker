FROM php:8.3-fpm-alpine

RUN apk update && apk add --no-cache nginx \
    && mkdir -p /run/nginx \
    && rm -rf /var/cache/apk/*

COPY data/default.conf /etc/nginx/http.d/default.conf
COPY data/index.php /var/www/html/index.php

EXPOSE 80

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
