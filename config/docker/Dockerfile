FROM library/php:8.2.2-fpm

RUN apt update && \
    apt-get install -y git && \
    apt-get install -y libzip-dev && \
    apt-get install -y zip unzip && \
    apt-get install -y \
            libfreetype6-dev \
            libjpeg62-turbo-dev \
            libpng-dev

RUN docker-php-ext-install gd pdo pdo_mysql opcache

RUN pecl install redis && \
    docker-php-ext-enable redis

WORKDIR /var/www/html
COPY ./src ./

RUN chmod -R 777 uploads

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 9000

CMD chmod -R 777 /var/www/html/uploads && php-fpm