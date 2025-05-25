FROM php:8.2-fpm

# Install system dependencies including Node.js
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_sqlite mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www/

# Install dependencies
RUN composer install

# Install NPM dependencies and build assets
RUN npm install
RUN npm run build

# Create SQLite database directory and file
RUN mkdir -p /var/www/database
RUN touch /var/www/database/database.sqlite

# Create storage directories and set permissions
RUN mkdir -p /var/www/storage/framework/views
RUN mkdir -p /var/www/storage/framework/cache/data
RUN mkdir -p /var/www/storage/framework/sessions
RUN mkdir -p /var/www/storage/logs

# Change ownership of our applications
RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 /var/www/storage
RUN chmod -R 775 /var/www/database
RUN chmod -R 775 /var/www/bootstrap/cache

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]