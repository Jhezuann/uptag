FROM php:8

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip


RUN apt-get update \
     && docker-php-ext-install mysqli pdo pdo_mysql \
     && docker-php-ext-enable pdo_mysql


COPY . /var/www/html

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html"]
#MYSQL_ROOT_PASSWORD

# docker run -d --name my-mysql-container \
# -e MYSQL_ROOT_PASSWORD=hugo123 \
# -v /my/own/datadir:/var/lib/mysql \
# --network mynet \
# mysql:latest