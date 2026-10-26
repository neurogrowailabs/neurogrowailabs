FROM serversideup/php:8.4-fpm-apache

ENV AUTORUN_ENABLED="true"
ENV AUTORUN_LARAVEL_MIGRATION="false"

USER root

# Copy application code with proper ownership
COPY --chown=www-data:www-data . /var/www/html

# Switch to www-data for application commands
USER www-data

# Install production dependencies safely matching PHP 8.4
RUN composer install --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader --prefer-dist
