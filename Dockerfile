FROM php:8.2-apache

# Installation des extensions nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git libicu-dev \
    && docker-php-ext-install pdo_mysql zip intl opcache

# Config Apache pour pointer vers le dossier /public de Symfony
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

WORKDIR /var/www/html
COPY . .

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Compilation de Tailwind et des Assets (important pour ton front !)
# Si tu utilises le bundle Tailwind :
RUN php bin/console tailwind:build --minify
RUN php bin/console asset-map:compile

# Droits d'écriture pour Symfony
RUN chown -R www-data:www-data var/