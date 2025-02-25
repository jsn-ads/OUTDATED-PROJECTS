-Instalando Composer
    crie um arquivo dentro do projeto com nome:
        composer.json 
        {
            "require":{

            }
        }
    apos isso digite no terminal na raiz do projeto
        composer install
        composer init
        composer update


----------------------------------------------------------------------------------------

-Instalando Laravel global , apenas uma unica vez e necessario ter composer instalado 
    composer global require laravel/installer

-criando um projeto
    laravel new "nome do projeto" --auth

-criando key do banco de dados no arquivo (.env)
    php artisan key:generate

- Caso o Laravel nao tenha Auth na Pasta controller faça esse comando
    composer require laravel/ui
    php artisan ui vue --auth

-start no projeto
    php artisan serve

-Criando um controller
    php artisan make:controller "nome do Controller"
    
    "cria controller com metodos e rotas ja pre definidas"
    php artisan make:controller "nome do Controller" --resource
    
-Criando um Model
    php artisan make:model "nome do Model"

-Instalando Painel AdminLTE 
    composer require jeroennoten/laravel-adminlte
    php artisan adminlte:install --force