FROM php:8.1-cli-alpine

ENV HUAWEI_API_URL=http://192.168.8.1
ENV HUAWEI_API_USERNAME=admin
ENV HUAWEI_API_PASSWORD=

RUN apk add --no-cache --update curl libxml2-dev \
    && docker-php-ext-install xml

ENV LIBRARY_PATH=/lib:/usr/lib

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === trim(file_get_contents('https://composer.github.io/installer.sig'))) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /app

COPY . .

RUN /usr/local/bin/composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader

ENTRYPOINT ["php", "docker/api.php"]
