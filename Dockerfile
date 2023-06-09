FROM ubuntu:22.04

# Set Image name
LABEL Name=babylon Version=0.0.1

# Install dependencies
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update -q && apt-get install -qqy \
#        apache2 \
        vim \
        git \
        composer \
        php \
        php-mbstring \
        php-xml \
        php-zip \
        php-sqlite3 \
        php-mysql \
        php-intl \
        php-curl \
        php-json \       
        php-codesniffer && \
        rm -rf /var/lib/apt/lists/*

# Copy apache vhost file
COPY babylon.conf /etc/apache2/sites-available/000-default.conf

# Enable apache mods.
RUN a2enmod rewrite && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy source code
RUN rm -rf /var/www/html
COPY . /var/www/html/Babylon

# Set work directory
WORKDIR /var/www/html/Babylon

# Install dependencies
RUN composer install

# Set permissions
RUN chgrp -R www-data logs tmp && \
    chmod -R g+rw logs tmp

EXPOSE 80
EXPOSE 443
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
