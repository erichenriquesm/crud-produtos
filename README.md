# CRUD DE PRODUTOS

PRIMEIROS PASSO

- rodar o comando docker-compose up

- rodar o comando docker ps para pegar o id da imagem 

- iniciar uma imagem da aplicação com php run -it id da imagem /bin/bash

- próxima vez que ser necessário acessar a imagem para rodar comando nativos, rode o comando php exec -it id da imagem /bin/bash 

- para pegar o caminho relativo use o pwd no terminal

- copiar migrations da imagem para a pasta local do projeto docker cp idcontainer:/var/www/database/migrations caminho relativo/crud-produtos/database

ESTÁ DISPONÍVEL:
 - phpmyadmin (porta 8080)
 - servidor do lumen (porta 8000)
 - mysql  (porta 3307)