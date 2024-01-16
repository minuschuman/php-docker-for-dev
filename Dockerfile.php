# Use a base image with PHP 7.4.3
FROM php:7.4.3

# Install MySQL client
RUN apt-get update && \
    apt-get install -y default-mysql-client

# install php-mysqli
RUN docker-php-ext-install mysqli && \
    docker-php-ext-enable mysqli


# Install Redis extension
RUN pecl install redis && \
    docker-php-ext-enable redis

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP files into the container (assuming you have a directory with your PHP code)
COPY . /var/www/html

# Expose port 80 (if not already done in the base image)
EXPOSE 80

# Start your PHP application (you might need to replace `index.php` with the actual entry point of your application)
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]
