==================================================REACT NATIVE==============================================

    Android -> Kotlin
    iOS -> Swift

    React NATIVE
    - Cria o app em React NATIVE(que utliza React na base)
    - Build (traduz o scrip na linguagem nativa do sistema)
        - React Native

==================================================CONFIGURAÇÕES==============================================


    - Expo CLI       (Iniciante)
    - RN CLI         (Avançado)

Expo GO (Expo CLI)
    - https://expo.dev/login(criar caso não tenha uma conta)
    - Baixa App no dispositivo(mobile)
    - Nodejs 

====================================================COMANDOS================================================

    @REM Criando um PROJETO
        npx create-expo-app --template

    @REM startando o PROJETO
        npx expo start

    @REM Parando Servidor
        CTRL + C

    @REM Reiniciando PROJETO
        R
    @REM --Help: caso npx expo esteja dando erro para criar ou start no projeto (pacote desatualizado ou npx não esteja instalado)
        npm install expo
    @REM --Limpeza de cash do NPM
        npm cache clean --force
    @REM --Verificar versão
        npm -v
        node -v
    @REM --Atualiza o NODE e o NPM que ja esta instalado, porem este comando deve se inserido no CMD
        winget install OpenJS.NodeJS.LTS
        npm install -g npm@latest

======================================================EXTRA==================================================

    New minor version of npm available! 10.2.5 -> 10.8.3
    Changelog: https://github.com/npm/cli/releases/tag/v10.8.3

    @REM atualizar NPM 
        npm install -g npm@10.8.3 to update
        npm install -g npm@11.5.2