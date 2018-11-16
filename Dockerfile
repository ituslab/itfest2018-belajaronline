FROM zzcomzz/php-apache-composer


WORKDIR /var/www/html/it-a/

COPY . .



# RUN apt-get update
# RUN apt-get install -y libxml2* zip unzip
# RUN docker-php-ext-install xml
RUN composer install
RUN composer dump-autoload



EXPOSE 80


CMD ["apache2-foreground"]