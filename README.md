# API FOUNDCARE

Para rodar esse projeto em sua máquina, são necessários os seguintes pacotes.

## Requerimentos
- Gerenciador de dependências <i>Composer</i> 
    - Faça o teste se você possui o composer
      ``` bash
      composer -v
      ```
    - Link de download: https://getcomposer.org/download/
- <i>PHP</i> ou o <i>Xampp</i> instalado na máquina
    - Link de download: https://www.apachefriends.org/pt_br/download.html
    - OBS: selecione a versão do xampp com o PHP 8.2.12

## Rodar aplicação
1° Clonar o repositório
```bash
https://github.com/FoundCare/api.git
```
#
2° Entrar na pasta da api
```bash
cd api
```
#
3° Instalar as dependências utilizando o composer
```bash
composer install
```
#
4° No diretório raiz do projeto, criar o arquivo <b>database.sqlite</b>
```bash
touch database/database.sqlite
```
#
5° No diretório raiz do projeto, renomear o arquivo <b>.env.example<b> para <b>.env</b>
#
6° No arquivo <i>.env</i> substitua os valores <i>sqlite</i>
#### DB_CONNECTION=sqlite
#### DB_DATABASE= // Informar o caminho absoluto do arquivo <i><b>database.sqlite</b></i>
#### #DB_HOST=127.0.0.1
#### #DB_PORT=3306
#### #DB_USERNAME=root
#### #DB_PASSWORD=
#
7° Gerar uma chave para rodar o projeto
```bash
php artisan key:generate
```
#
8° Rodar as migrations do projeto
```bash
php artisan migrate
```
#
9° Rodar os seeders para que o banco de dados seja populado
```bash
php artisan db:seed
```
#
10° É necessário que geremos uma PASSPORT_PRIVATE_KEY e PASSPORT_PUBLIC_KEY, para isso rodamos o comando abaixo
```bash
php artisan passport:key
```
### OBS: as chaves serão geradas na pasta /storage
### <i>oauth-private.key</i>
### <i>oauth-public.key</i>
#
11° Copie o valor de ambos os campos e cole no arquivo <b><i>.env</i></b>
## PASSPORT_PRIVATE_KEY e PASSPORT_PUBLIC_KEY
#
12° Agora precisamos gerar um CLIENT_ID e um CLIENT_SECRET para que a API possa fazer as consultas nos endpoints
```bash
php artisan passport:client --personal
```
Retorno:
```bash
Client id ................................................... <client_id_secret>
Client Secret ............................................... <client_id_secret>
```
#
13° Seguido todos os passos acima, agora é hora de rodar o projeto
```
php artisan serve
```
Retorno:
```bash
INFO  Server running on [http://127.0.0.1:8000].

Press Ctrl+C to stop the server
```
