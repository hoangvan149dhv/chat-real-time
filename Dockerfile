FROM php:7.4-fpm
COPY . /var/www/html/chat/
# Set working directory
WORKDIR /var/www/html/chat

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    curl \
    libzip-dev \
    supervisor

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-configure gd  --with-jpeg=/usr/include/ --with-freetype=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

# Add user for laravel application
RUN groupadd -g 1000 van
RUN useradd -u 1000 -ms /bin/bash -g van van

# Congigure supervisor
COPY chat-supervisord.conf /etc/supervisor/conf.d/chat-supervisord.conf
# Set permissions for supervisor
RUN chown -R van /run/ /var/log/supervisor/ /var/run/

USER van

CMD ./start.sh
