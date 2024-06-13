FROM php:8.3-fpm as php

LABEL author="Russel Dellosa"

ENV USER=www-user
ENV GROUP=www-group

# Adding proxy to avoid error fetching debian.port 80
# ENV http_proxy=deb.debian.org/debian

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    curl \
    git \
    jpegoptim optipng pngquant gifsicle \
    locales \
    unzip \
    vim \
    zip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP Graphics Draw extensions
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install PHP Multibyte String extensions
RUN apt-get update && apt-get install -y libonig-dev && docker-php-ext-install mbstring
RUN apt-get install libldap2-dev -y && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/

# Install PHP Miscellaneous extensions
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install exif
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install ldap
RUN docker-php-ext-install sockets

# Install Composer
COPY --from=composer:2.7.1 /usr/bin/composer /usr/local/bin/composer

# Installing Node and NPM
RUN curl -fsSL https://deb.nodesource.com/setup_20.x
RUN apt-get update && apt-get install -y \
    nodejs \
    npm

# Copy entrypoint
ADD docker/entrypoint.sh /var/www/entrypoint.sh
RUN chmod +x /var/www/entrypoint.sh

# Make a code directory
RUN mkdir -p /var/www/app-source

# Setup working directory & Copy content
WORKDIR /var/www/app-source

# Create User and Group
RUN groupadd -g 1000 ${GROUP} && useradd -u 1000 -ms /bin/bash -g ${GROUP} ${USER}

# Grant Permissions
RUN chown ${USER}:${GROUP} /var/www/app-source/ # Parent directory permissions
RUN chown -R ${USER}:${GROUP} /var/www/app-source # Permissions of all the files inside

# Select User
USER ${USER}

# Copy permission to selected user
COPY --chown=${USER}:${GROUP} . .

# Expose port 9000 and start the php-fpm server. PHP-FPM listens to port 9000 by default
EXPOSE 9000
CMD ["php-fpm"]
ENTRYPOINT [ "/var/www/entrypoint.sh" ]

FROM php as local-build

# Set-up the php.ini config for local development
COPY docker/php/local.ini /usr/local/etc/php/conf.d/local.ini