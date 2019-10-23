#comenzar con la imagen base de ubuntu para poder ejecutar los comandos de instalación en el contenedor
FROM php:7.2-apache

######################
#    COMPOSER
######################

#Instalar extensiones de PHP necesarias para composer
RUN apt-get -yqq update
RUN apt-get -yqq upgrade
RUN apt-get -yqq install libzip-dev
RUN docker-php-ext-install zip

#Descargar el instalador
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
#Verificar la validez del instalador
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
#Ejecutar el instalador
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
#Borrar en instalador
RUN php -r "unlink('composer-setup.php');"

############################################
#   INSTALADOR DE COMPOSER PARA LARAVEL
############################################

RUN composer global require laravel/installer

#Ejecutar comando al iniciar
CMD a2enmod rewrite && service apache2 start;bash
