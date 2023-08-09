# Use the official PHP 8.2 FPM image as the base
FROM php:8.2-fpm

# Install system dependencies and required PHP extensions
RUN apt-get update && \
    apt-get install -y \
        libpq-dev \
        libssl-dev \
        zlib1g-dev \
        git \
        libzip-dev && \
    docker-php-ext-install pdo pdo_pgsql zip && \
    rm -rf /var/lib/apt/lists/*
  

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www

# Expose port 9000 to communicate with PHP-FPM
EXPOSE 9000

# Start the PHP-FPM process
CMD ["php-fpm"]

