# Use the official PHP image with Apache for PHP 8.0
FROM php:8.2.12-apache

# Install dependencies including the Zip extension
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip exif \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the existing application directory contents
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Allow Composer plugins to run as superuser
ENV COMPOSER_ALLOW_SUPERUSER=1
# Install Laravel dependencies
RUN composer install
# Expose port 80
EXPOSE 8088
