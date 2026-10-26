FROM php:8.3-apache

# Install required system packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite module
RUN a2enmod rewrite

# Configure Apache DocumentRoot to Laravel's public directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Run Composer Install
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set correct storage permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Dynamic port binding for Render ($PORT) and start Apache
CMD ["sh", "-c", "sed -i \"s/Listen [0-9]*/Listen ${PORT:-80}/\" /etc/apache2/ports.conf && sed -i \"s/<VirtualHost \\*:[0-9]*>/<VirtualHost \\*:${PORT:-80}>/\" /etc/apache2/sites-available/000-default.conf && php artisan config:clear && php artisan view:cache && apache2-foreground"]
