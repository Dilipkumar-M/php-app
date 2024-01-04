# Use the official PHP image
FROM php:7.4-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy the application files to the container
COPY . /var/www/html/
