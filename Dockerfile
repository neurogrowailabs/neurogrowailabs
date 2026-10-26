FROM serversideup/php:8.3-fpm-nginx

ENV AUTORUN_ENABLED="true"
ENV AUTORUN_LARAVEL_MIGRATION="false"

USER root
COPY --chown=www-data:www-data . /var/www/html
USER www-data

RUN composer install --no-dev --no-interaction --no-progress --optimize-autoloader --prefer-dist
