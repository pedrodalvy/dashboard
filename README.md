## Descrição do projeto

Dashboard criado para gerenciar o site https://www.pedrodalvy.com. É possível adicionar informações como Perfil, Experiências e Formações, da mesma forma que é preenchido um currículo padrão.


### Requisitos

* PHP 7.2.5 ou superior
* Banco de Dados (ex: MySQL, PostgreSQL, SQLite)
* Servidor Web (eg: Apache, Nginx, IIS)
  

### Framework

O dashboard utliza o [Laravel](http://laravel.com), framework PHP, versão 7.2 e o [Bootstrap 4](https://getbootstrap.com/) para front-end.


### Instalação do projeto

* Necessário o [Composer](https://getcomposer.org/download)
* Clonar o repositório: `git clone https://github.com/pedrodalvy/dashboard.git`
* Após clonar, acessar a pasta do projeto: `cd dashboard`
* Instalar as dependências: `composer install`
* Gerar a migration com dados de exemplo: `php artisan migrate --seed`


### Utilização

Após gerar as seeds, o usuário padrão é admin e a senha também é admin, porém a tela inicial ainda não foi finalizada.


### Utilização da API

É possível utilizar a API para visualizar todos os dados cadastrados no sistema em formato Json e integrá-lo com outro sistema.

* Opcionalmente, executoar o servidor embutido do php: `php artisan serve`
* Acessar a rota: `https://localhost:8000/api/v1/resume-info/1` para obter o retorno com os dados cadastrados.

O número 1 no final da url representa o id do perfil. Atualmente o sistema só suporta um perfil, posteriormente será modificado para adição de mais usuários.
