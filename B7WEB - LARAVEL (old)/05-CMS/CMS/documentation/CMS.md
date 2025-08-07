Autor: José Alves de Souza Neto
Data Inicio : 27/04/2021
Data Conclusão : 25/05/2021
Versão: 1.0

TECNOLOGIAS: 
    FrontEnd
        Painel - adminLTE
        Template - bootstrap 4.0
        Bootstrap
        JavaScript
    BackEnd
        PHP
        Laravel
        Composer

-SOBRE O SISTEMA
    Sistema de gerenciamento de Conteudo
        sistema que gerencia usúarios e paginas criadas pelos mesmos e faz medição de usuarios online no sistema e nas paginas 

-BACKEND

    -SQL
        pages
        settings
        users
        visitors

    -MODELS
        PAGE     
        SETTING     
        USER     
        VISITOR

    -CONTROLLERS
        [ADMIN]         [B1]    HomeController    -> Responsavel pelo inicio do painel , trazendo informaçoes sobre o sistema
        [ADMIN]         [B2]    PageController    -> Responsavel pelas paginas dos usuarios
        [ADMIN]         [B3]    ProfileController -> Responsavel pelo perfil do usuario
        [ADMIN]         [B4]    SettingController -> Responsavel pela configuração do titulo , cor e email do sistema
        [ADMIN]         [B5]    UploadController  -> Responsavel pelo salvar e trazer de imagens do sistema
        [ADMIN]         [B6]    UserController    -> Responsavel pelos usuarios
        [ADMIN][AUTH]   [B7]    LoginController           -> Responsavel pelo Login
        [ADMIN][AUTH]   [B8]    ConfirmPasswordController -> Responsavel pela confirmaçao de senha
        [ADMIN][AUTH]   [B9]    RegisterController        -> Responsavel por criar novo usuario caso não tenha acesso

        [CMS]HomeController -> Responsavel pela tela inical do sistema

    -MIDDLEWARE
        AUTHENTICATE            -> Responsavel por verificar se usuario esta logado , caso contrario manda para login
        REDIRECTIFAUTHENTICATED -> Respodavel por redirecionar para ADM homeController , caso se usuario seja validado

    -PROVIDERS
        AUTHSERVICEPROVIDER     -> Responsavel por criar permissoes 
        APPSERVICEPROVIDER      -> Responsavel com criar variaveis globais , (trazendo menu) 

    -CONFIG
        ADMINLTE -> configuração do painel adminlte
        DATABASE -> configuração de banco

    -DATABASE 
        BANCO -> CMS
    
-FRONDEND

    -PUBLIC 
        [ASSETS][CSS] CONTENT -> Utilizando no ADMIN VIEW PAGES(create/edit - body)

    -RESOURCES
        [LANG] pt-BR

    -RESOURCES VIEWS
        [ADMIN][AUTH]       [B7 B8 B9]      LOGIN | REGISTER
        [ADMIN][PAGES]      [B2]            INDEX | CREATE | EDIT
        [ADMIN][PROFILE]    [B3]            INDEX
        [ADMIN][SETTINGS]   [B4]            INDEX
        [ADMIN][USERS]      [B6]            INDEX | CREATE | EDIT
        [ADMIN][HOME]       [B1]            HOME

        [CMS][HOME]         [APPSERVICEPROVIDER]               LAYOUT| HOME

    -ROUTES
        API ->rotas de api
        WEB ->rotas dos controllers
