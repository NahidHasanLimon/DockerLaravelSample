# Use a suitable base image for the Supervisor container (e.g., Alpine Linux)
FROM php:8.1-fpm-alpine

# Install Supervisor
RUN apk add --no-cache supervisor
RUN docker-php-ext-install pdo pdo_mysql
# Create a directory for Supervisor logs
RUN mkdir -p /var/log/supervisor
# Copy your Supervisor configuration file into the container
COPY  docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Run Supervisor
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]