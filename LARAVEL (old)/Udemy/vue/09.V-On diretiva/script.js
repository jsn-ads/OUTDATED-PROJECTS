const vm = new Vue({
    el:"#app",
    data() {
        return {
            d1: 'esperando...',
            d2: 0,
            d3: ""
        }
    },
    methods: {
        metodo1(){
            this.d1 = 'bloquendo o envio'
        },
        metodo2(){
            this.d2++
        },
        metodo3(e){
            this.d3 += e.key;
        }
    },
})