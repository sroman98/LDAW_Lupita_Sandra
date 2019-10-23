#!/bin/bash

#Sin composer
#sudo docker run --rm -it -p 9077:80 -v /www/tec/ldaw/2019/ad/github_repo_professor/laravel_app:/var/www/html/laravel_app  --name laravel_ldaw_ad19 laravel_daw_ad19

#Corriéndola con composer
sudo docker-compose up -d
#ejecutar el bash para la app
sudo docker exec -it laravel_proyecto_ldaw_img bash
