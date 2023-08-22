# Use the official PHP with Apache image as the base image
FROM php:apache

# Install the mysqli extension
RUN docker-php-ext-install mysqli

# Install PHP extensions required by CodeIgniter 4
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache rewrite module (required for CodeIgniter 4)
RUN a2enmod rewrite
