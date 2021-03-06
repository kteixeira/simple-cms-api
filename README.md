# CMS PURE API

Uma simples API que simula algumas funcionalidades de um CMS.


## Tecnologias
* PHP
* MySQL
* Composer
* Bibliotecas
  * [Bramus-Router](https://github.com/bramus/router)
  * [PHP-JWT](https://github.com/firebase/php-jwt)


## Instalação

*- composer require kteixeira/simple-cms-api dev-master* (Em breve)

* Composer
  - Caso não tenha, veja como instalar na [Documentação Oficial](https://getcomposer.org/download/)
  
* Instruções
  - Clone o projeto em seu local
  - Rode o comando composer install
  - Em */configs* crie um arquivo chamado **database.php**, há um modelo para se espelhar, chamase **database_example.php**. Preencha com seus dados de conexão ao MySQL.
  - Dê start em um servidor de testes com o comando: php -S localhost:8080 (ou a porta que preferir).
  - Faça primeiro a autenticação e em seguida insira o *access_token* recebido, nos headers.

#### Observação
- O arquivo  ****dump_cms.sql**** encontra-se na raiz do projeto e é um script em SQL para a criação do Schema e das Tabelas, já populando com a aplicação de teste.

----------------------------------------------------------------------------------

# API

### Create Post

* URL
  * /posts
  
* Method
  * POST
  
* URL Params required: [title, path] 

* Body
  * {"post":{"title":"Lorem Ipsum","body":"Lorem Ipsum","path":"\/path\/test"}}
  
* Success Response
  * Code: 201
  * Content: {"post":{"id":1,"title":"Lorem Ipsum","body":"Lorem Ipsum","path":"\/path\/test","created_at":"2017-11-30 00:04:47","updated_at":"2017-11-30 00:04:47"}}
  
### Update Post

* URL
  * /posts/:id
  
* Method
  * PUT
  
* Body
  * {"post":{"title":"Lorem Ipsum", "body":"Lorem Ipsum Updated", "path":"\/path\/test"}}
  
* Success Response
  * Code: 200
  * Content: {"post":{"id":1,"title":"Lorem Ipsum","body":"Lorem Ipsum Updated","path":"\/path\/test","updated_at":"2017-11-30 00:10:17"}}
  
### Get Post

* URL
  * /posts/:id
  
* Method
  * GET
    
* Success Response
  * Code: 200
  * Content: [{"id":"1","title":"Lorem Ipsum","body":"Mel assum dicant intellegat et.","path":"\/path\/test","created_at":"2017-11-29 23:13:47","updated_at":"2017-11-29 23:32:58"}]

### Get Posts

* URL
  * /posts
  
* Method
  * GET
    
* Success Response
  * Code: 200
  * Content: [{"id":"1","title":"Lorem Ipsum","body":"Mel assum dicant intellegat et.","path":"\/path\/test","created_at":"2017-11-29 23:13:47","updated_at":"2017-11-29 23:32:58"},
  {"id":"1","title":"Lorem Ipsum","body":"Mel assum dicant intellegat et.","path":"\/path\/test","created_at":"2017-11-29 23:13:47","updated_at":"2017-11-29 23:32:58"},
  {"id":"1","title":"Lorem Ipsum","body":"Mel assum dicant intellegat et.","path":"\/path\/test","created_at":"2017-11-29 23:13:47","updated_at":"2017-11-29 23:32:58"}]

### Delete Post

* URL
  * /posts/:id
  
* Method
  * DELETE
  
* Success Response
  * Code: 200
  * Content: {"message":"Success"}


### Auth Application

* URL
  * /auth

* Method
  * POST

* URL Params required: [name, password]

* Body (Já são os dados do usuário cadastrado no banco)
  * {"name": "App Teste","password": "teste1234"}
  
* Success Response
  * Code: 200
  * Content: {"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1MTIwMDgwNTEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdCIsImV4cCI6IjE1MTIwMTE2NDkiLCJuYmYiOjE1MTIwMDgwNTAsImRhdGEiOnsiaWQiOiIxIiwibmFtZSI6IkFwcCBUZXN0ZSIsImtleSI6IlhqWlVDbjlMdnhURiJ9fQ.TzDBAyi_bRmhYhn7lSFQ3CGNfetf-p5zR14gnf_AIDo"}