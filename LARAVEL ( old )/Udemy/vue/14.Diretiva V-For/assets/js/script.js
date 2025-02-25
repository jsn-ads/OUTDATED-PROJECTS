const vm = new Vue({
    el:"#app",
    data() {
        return {

            n : 5 ,

            lista  : [
                'laravel',
                'vue',
                'mysql',
                'bootstrap'
            ],

            cursos : [

                 {
                    id: 1,
                    nome: "laravel",
                    descricao : "framework de php"
                },

                {
                    id: 2,
                    nome: "vue",
                    descricao : "framework de javascript"
                }
            ],
        }
    },
    methods: {
        adicionarCurso(){
            this.lista.push(cnome.value);
        },
        removerCurso(){
            this.lista.pop();
        }
    },
})