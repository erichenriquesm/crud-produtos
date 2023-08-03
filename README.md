# CRUD DE PRODUTOS

# PRIMEIROS PASSO

- rodar o comando docker-compose up

- rodar o comando docker images

- iniciar uma imagem da aplicação com php run -it id da imagem /bin/bash

- próxima vez que ser necessário acessar a imagem para rodar comando nativos rode o comando php exec -it id da imagem /bin/bash 

- para pegar o caminho relativo use o pwd

- copiar migrations da imagem para a pasta local do projeto docker cp idcontainer:/var/www/database/migrations caminho relativo/crud-produtos/database