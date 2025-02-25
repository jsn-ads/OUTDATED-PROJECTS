-criando um projeto
    laravel new "nome do projeto"

-criando key do banco de dados no arquio (.env)
    php artisan key:generate

-start no projeto
    php artisan serve

-Criando um controller
    php artisan make:controller "nome do Controller"
    
    "cria controller com metodos e rotas ja pre definidas"
    php artisan make:controller "nome do Controller" --resource
    
-Criando um Model
    php artisan make:model "nome do Model"

-Instalando Composer
    composer install
    composer init
    composer update

    - Caso o Laravel nao tenha Auth na Pasta controller faça esse comando
        compose require laravel/ui
        php artisan ui vue --auth
        ou 
        php artisan ui bootstrap --auth