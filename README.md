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
http://127.0.0.1:8000/api/users
```
#### Retorno:
```json
{
    "status": true,
    "message": "Success",
    "body": [
        {
            "id": 1,
            "name": "Jefferson",
            "email": "matheusdesenvolvedor011@gmail.com",
            "email_verified_at": null,
            "created_at": "2024-09-05T19:54:10.000000Z",
            "updated_at": "2024-09-05T19:54:10.000000Z",
            "deleted_at": null
        },
        {
            "id": 2,
            "name": "helloeewewe",
            "email": "jefferson.ollvweee@gmail.com",
            "email_verified_at": null,
            "created_at": "2024-09-05T19:54:10.000000Z",
            "updated_at": "2024-09-06T17:09:09.000000Z",
            "deleted_at": null
        },
        {
            "id": 3,
            "name": "Geovanna",
            "email": "geovannasilvasousa2@gmail.com",
            "email_verified_at": null,
            "created_at": "2024-09-05T19:54:11.000000Z",
            "updated_at": "2024-09-05T19:54:11.000000Z",
            "deleted_at": null
        },
        {
            "id": 4,
            "name": "Arthur",
            "email": "arthuralexandredealmeida@gmail.com",
            "email_verified_at": null,
            "created_at": "2024-09-05T19:54:11.000000Z",
            "updated_at": "2024-09-05T19:54:11.000000Z",
            "deleted_at": null
        },
        {
            "id": 5,
            "name": "João",
            "email": "j.vitor.moura.37@gmail.com",
            "email_verified_at": null,
            "created_at": "2024-09-05T19:54:12.000000Z",
            "updated_at": "2024-09-05T19:54:12.000000Z",
            "deleted_at": null
        }
    ]
}
```
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
#### Retorno:
```json
{
    "status": true,
    "message": "Success",
    "body": [
        {
            "id": 1,
            "name": "Jefferson",
            "email": "matheusdesenvolvedor011@gmail.com",
            "email_verified_at": null,
            "created_at": "2024-09-05T19:54:10.000000Z",
            "updated_at": "2024-09-05T19:54:10.000000Z",
            "deleted_at": null
        }
    ]
}
```
<br>

#### POST - Cria um usuário no sistema

#### Essa rota vai ser utilizada para criar usuários

#### No <i>body</i> da requisição é necessário vir especificado os parâmetros

#### name
#### email
#### password

```bash
http://127.0.0.1:8000/api/users
```
<br>
Caso alguns dos dados não venham a API retornára uma mensagem de erro
```json
{
    "status": false,
    "erros": {
        "password": [
            "Campo password é obrigatório!"
        ]
    }
}
```
#### Obs: Todas as validações utilizadas para verificar se os dados dessa rota estão no arquivo: api/app/Http/Requests/UserStoreRequest.php
<br>

#### PUT - Edita os dados de um usuário no sistema

#### name
#### email
#### password
<br>
```bash
http://127.0.0.1:8000/api/users/1
```
Retorno:
```json
{
    "status": true,
    "message": "Usuário editado com sucesso!",
    "body": {
        "id": 5,
        "name": "João Moura",
        "email": "j.vitor.mouraaaa.37@gmail.com",
        "email_verified_at": null,
        "created_at": "2024-09-07T23:35:46.000000Z",
        "updated_at": "2024-09-08T00:59:37.000000Z",
        "deleted_at": null
    }
}
```

Pelo menos um dos dados é opcional, caso não seja informado nenhum parâmetro a API retornará a seguinte mensagem
#### Retorno: JSON de Dados e um código com status 400
```json
{
    "status": false,
    "message": "É necessário informar ao menos um parâmetro para edição",
    "body": null
}
```
<br>

#### DELETE - Aplica um soft_delete no usuário selecionado
```bash
http://127.0.0.1:8000/api/users/1
```
#### Retorno:
```json
{
    "status": true,
    "message": "Usuário deletado com sucesso!",
    "body": {
        "id": 6,
        "name": "NewUser",
        "email": "jeffersewwedweon@gmail.comw",
        "email_verified_at": null,
        "created_at": "2024-09-08T01:23:19.000000Z",
        "updated_at": "2024-09-08T01:23:30.000000Z",
        "deleted_at": "2024-09-08T01:23:30.000000Z"
    }
}
```

#### POST - Cria um usuário no banco de dados
Na requisição é necessário informar os seguintes parâmetros no body
<br>

#### name <br>
#### email <br>
#### password <br>
Caso um dos parâmetros não seja informado o processo não vai funcionar e retornará um erro com status 403. <br>

#### Essa rota é responsável pela criação de um usuário no banco de dados
```bash
http://127.0.0.1:8000/api/users
```

#### PUT - Cria um usuário no banco de dados
Na requisição é necessário informar os seguintes parâmetros no body
<br>

#### name <br>
#### email <br>
#### password <br>
Caso um dos parâmetros não seja informado o processo não vai funcionar e retornará um erro com status 403. <br>

#### Essa rota é responsável pela edição de usuários no banco de dados
```bash
http://127.0.0.1:8000/api/users/{user}
```
#### Paramêtro {user}: id do usuário no banco de dados
```bash
http://127.0.0.1:8000/api/users/1
```

#### DELETE - Deleta um usuário no banco de dados

#### Essa rota é responsável pela exclusão de usuários no banco de dados
```bash
http://127.0.0.1:8000/api/users/{user}
```
#### Paramêtro {user}: id do usuário no banco de dados
```bash
http://127.0.0.1:8000/api/users/1
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

#### Desenvolvido por: Jefferson Gonçalves.
