FROM serversideup/php:8.4-fpm-apache

ENV AUTORUN_ENABLED="true"
ENV AUTORUN_LARAVEL_MIGRATION="true"

USER root

# Copy application code with proper ownership
COPY --chown=www-data:www-data . /var/www/html

# Ensure SQLite database exists and is writable for consent logging
RUN touch /var/www/html/database/database.sqlite \
    && chown -R www-data:www-data /var/www/html/database \
    && chmod -R 775 /var/www/html/database \
    && chmod 664 /var/www/html/database/database.sqlite

# Switch to www-data for application commands
USER www-data

# Install production dependencies safely matching PHP 8.4
RUN composer install --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader --prefer-dist
