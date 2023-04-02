# Projeto de Gerenciamento de Vagas de emprego
Esse projeto consiste em um CRUD de vagas de empregos e candidatos, que permitem ao user autênticado adicionar gerenciar vagas e candidatos.

O setup é feito com docker, então é preciso ter o docker instalado e rodando na máquina.

O projeto usa PHP 8.2

## Setup
1. Primeiro é necessário baixar as dependencias para rodar o sail, então rode o comando abaixo
```docker
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

```
2. Copie o .env.example como seu arquivo .env

```sh
cp .env.example .env

```
3. Logo depois será preciso subir os containers

```docker
./vendor/bin/sail up -d
```
4. Será preciso gerar a key da aplicação

```docker
./vendor/bin/sail artisan key:generate
```
5. Após subir o container será preciso rodar as migrations

```sh
./vendor/bin/sail artisan migrate:refresh
```
6. depois rodar a seeder que irá gerar o usuário admin `teste@example.com` com a senha `password`
```sh
./vendor/bin/sail artisan db:seed
```
7. Instale os pacotes do npm
```sh
./vendor/bin/sail npm install
```
8. Rode o npm para buildar os assets
```sh
./vendor/bin/sail npm run build
```
9. E por fim, rode os testes para verificar se está tudo ok
```sh
./vendor/bin/sail test
```
caso o container do laravel não consiga se conectar no container do mysql, espere alguns um pouco e tente novamente.
Na minha experiência o container do banco de dados demorava um pouco ficar acessível pelo container do laravel na primeira vez que rodava. Nas próximas vezes já vai funcionar instântaneamente

## Informações
A aplicação estará rodando na porta 80, então basta acessar [o localhost](http://localhost) e clicar em login para começar a usar a aplicação. O usuário admin padrão tem o email `teste@example.com` e senha `password`
