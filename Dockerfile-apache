# Použijeme oficiálny obraz PHP s Apache pre PHP 8.2
FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev

RUN docker-php-ext-install gd pdo pdo_mysql

# Nastavíme pracovný adresár kontajnera na koreňový adresár Apache
WORKDIR /var/www/html

# Kopírujeme súbory z lokálneho adresára /src do pracovného adresára kontajnera
COPY ./src /var/www/html

# Apache už počúva na porte 80, takže môžeme tento port označiť pre expozíciu
EXPOSE 80