# Requisitos
    - php 8.0
    - composer 2.0
    - banco de dados MYSQL

# Como instalar
- Clone o repositorio
```
    https://github.com/gusttavodev/recycling_api.git
```
- Instale as dependencias com o composer
```
    composer update
```
- Copie o arquivo .env.example para um arquivo .env
- Altere os dados no .env para seus dados de conexão com o banco
```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=recycling_api
    DB_USERNAME=root
    DB_PASSWORD=root
```
- Ligue o servidor
```
    php artisan serve
```
- Agora você terá acesso aos endpoints da API

# Ao realizar as requisições adicione esses headers 
- Content-Type -> application/json
- Accept -> application/json
