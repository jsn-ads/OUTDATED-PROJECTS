const vm = new Vue({
    el:"#app",
    data() {
        return {
            status:true,
            valor : 1600,
            dados : 0
        }
    },
    methods: {
        verificar(){
            this.dados = idade.value; 
        }
    },
})