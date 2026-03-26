FROM php:8.2-apache

# Enable Apache mod_rewrite for URL rewriting (optional but good practice)
RUN a2enmod rewrite

# Install required PHP extensions for the project (mysqli for database connection)
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Copy the application source code to the Apache document root
COPY . /var/www/html/

# Expose port 80 (Render forwards to the port specified in settings or defaults to 80/10000 depending on Docker)
EXPOSE 80
