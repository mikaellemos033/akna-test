# Teste Backend Akna

O teste foi feito em PHP Nativo, usando algumas libs e trechos de código que eu ja havia criado em outras ocasiões.


## Como instalar
Você precisará do **Docker** ou do **Mysql** instalado na sua maquina e do **PHP 7** com o **Composer** instalado.

Caso opte por usar o Docker basta usar o comando ``docker-compose up`` para subir o banco de dados.

Caso use a instancia Mysql da sua maquina, execute o arquivo **akana.sql** presente na pasta ``devops/db`` e edite o arquivo **environments/environment.php**

Após subir o banco de dados, rode o comando `` composer install`` 

### Comandos
Para executar o comando que gera o arquivo use `` php akna to:csv``

Para persiste os dados na base use o comando  `` php akna to:save``

### Testes
Para executar os testes use o comando ``phpunit`` ou ``./vendor/bin/phpunit``
