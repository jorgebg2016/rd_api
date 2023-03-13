# RD API

Api de avaliação para adimissão

1. Execute `composer install` para instalar as dependencias da aplicação (Instale as extensões do php, caso necessário).

2. Certifique-se de que o banco de dados esteja criado e que o usário possui as devidas permissões.

3. Copie o conteudo do arquivo `.env.example` para o arquivo `.env` e preencha as variaveis de ambiente.

4. Execute o comando `php artisan key:generate` para gerar uma chave para a aplicação.

5. Execute o comando `php artisan migrate` para executar as migrations da aplicação - gerar as tabelas no banco de dados.

6. Execute o comando `php artisan l5-swagger:generate` para gerar a documentação dos endpoints da api - acessivél em <APP_URL>/api/docs.

7. Execute o comando `php artisan test --testsuite=Feature --stop-on-failure` para executar os tests em cada endpoint da api.

8. Execute o comando `php artisan serve` para executar o servidor de desenvolvimento local.
