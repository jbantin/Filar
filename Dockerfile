# Use multi-stage build for better optimization
FROM node:18-alpine AS node-builder

WORKDIR /app
COPY package*.json ./
# Install ALL dependencies (including dev) for building
RUN npm ci
COPY . .
RUN npm run build

# Main PHP image
FROM php:8.2-fpm-alpine

# Install system dependencies in one layer
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite \
    sqlite-dev \
    && docker-php-ext-install pdo_sqlite mbstring exif pcntl bcmath gd \
    && rm -rf /var/cache/apk/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files first for better layer caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

# Copy application code
COPY . .

# Copy built assets from node-builder stage
COPY --from=node-builder /app/public/build ./public/build

# Run composer scripts after copying all files
RUN composer run-script post-autoload-dump

# Create directories and set permissions in one layer
RUN mkdir -p storage/framework/{views,cache/data,sessions} \
    storage/logs \
    database \
    && touch database/database.sqlite \
    && chown -R www-data:www-data /var/www \
    && chmod -R 775 storage database bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]