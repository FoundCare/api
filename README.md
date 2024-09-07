# API FOUNDCARE

Para rodar esse projeto em sua máquina, são necessários os seguintes pacotes.

## Requerimentos
- Gerenciador de dependências <i>Composer</i>
- <i>PHP</i> ou o <i>Xampp</i> instalado na máquina

## Rodar aplicação
1° Instalar as dependências utilizando o composer
```bash
composer install
```
2° Descriptrografar o arquivo <i>.env</i>
```bash
php artisan env:decrypt --key=3UVsEgGVK36XN82KKeyLFMhvosbZN1aF
```
#
### No arquivo <i>.env</i> trocar os valores para utilizar o banco de dados para desenvolvimento local
#### DB_CONNECTION=mysql
#### DB_HOST=127.0.0.1
#### DB_PORT=3306
#### DB_DATABASE=foundcare
#### DB_USERNAME=root
#### DB_PASSWORD=
#

## Usuários - /api/users
<strong>Responsável por realizar a criação, edição e deletar os usuários na plataforma</strong><br>
Os endpoints listados aqui server para realizar requisições, <b>GET</b>, <b>POST</b>, <b>PATCH</b>, <b>POST</b> e <b>DELETE</b>

#### GET - Retorna todos os usuários
Essa rota traz todos os usuários de forma páginada, ou seja, passando o parâmetro {page} como 1, irá trazer os 10 primeiros usuários da plataforma.<br>
```bash
http://127.0.0.1:8000/api/users?page=1
```
#### Paramêtro {page}: responsável por trazer os usuários em forma paginada no resultado da API.
<br>

#### GET - Retorna apenas um usuário
Essa rota traz um usuário específico da plataforma
####
```bash
http://127.0.0.1:8000/api/users/{user}
```
#### Paramêtro {user}: responsável por trazer o usuário de acordo com o ID especificado
```bash
http://127.0.0.1:8000/api/users/1
```
<br>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

#### Responsáveis: Jefferson, Geovanna, Arthur, Ruan, João e Italo.
