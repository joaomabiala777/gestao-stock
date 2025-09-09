FROM php:8.2-apache
COPY / /var/www/html/

# Install the mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# The rest of your Dockerfile instructions, if needed
# For example, you can copy your PHP application files into the container here

# Expose port 80 (Apache)
EXPOSE 80

# Specify the command to run when the container starts (e.g., start Apache)
CMD ["apache2-foreground"]
