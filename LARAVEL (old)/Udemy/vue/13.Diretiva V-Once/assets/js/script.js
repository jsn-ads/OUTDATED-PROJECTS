const vm = new Vue({
    el:"#app",
    data() {
        return {
            valor : 1000
        }
    },
    methods: {
       add(){
            this.valor += parseFloat(dados.value);
       },
       remover(){
            this.valor -= parseFloat(dados.value);
       }
    },
})