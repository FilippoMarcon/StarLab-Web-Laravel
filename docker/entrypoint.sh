#!/bin/sh

PORT=${PORT:-80}

sed -i "s/listen 80;/listen ${PORT};/g" /etc/nginx/http.d/default.conf
sed -i "s/listen \[::\]:80;/listen [::]:${PORT};/g" /etc/nginx/http.d/default.conf

if [ ! -f /var/www/.env ]; then
    cp /var/www/.env.example /var/www/.env
fi

if [ -z "$APP_KEY" ]; then
    php /var/www/artisan key:generate --force
fi

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
