const vm = new Vue({
    el:"#app",
    data() {
        return {
            mensagem: 'Primeiro template controlado pelo Vue',
            valor : 189.90,
            logado : true,
            hobbies : [
                'dormi',
                'comer',
                'trabalhar',
                'relaxar'
            ],
            dados : {
                nome : 'jose alves',
                idade : 32,
                cursos : [
                    {
                        nome : 'laravel'
                    },
                    {
                        nome : 'vue'
                    }
                ]
            }

        }
    },
})