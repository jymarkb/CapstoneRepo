FROM php:8.1-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli

# Enable mod_rewrite if needed
RUN a2enmod rewrite

# Change Apache document root from /var/www/html to /www
RUN sed -i 's|/var/www/html|/www|g' /etc/apache2/sites-available/000-default.conf \
 && sed -i 's|/var/www/html|/www|g' /etc/apache2/apache2.conf

# Allow Apache to serve files from /www
RUN echo "<Directory /www>" >> /etc/apache2/apache2.conf \
 && echo "    AllowOverride All" >> /etc/apache2/apache2.conf \
 && echo "    Require all granted" >> /etc/apache2/apache2.conf \
 && echo "</Directory>" >> /etc/apache2/apache2.conf

# Copy everything from the build context (current directory) into /www in the container
COPY . /www

# Set proper permissions for the /www directory
RUN chown -R www-data:www-data /www
RUN chmod -R 755 /www

WORKDIR /www
