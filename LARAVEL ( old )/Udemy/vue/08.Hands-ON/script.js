const vm = new Vue({
    el:"#app",
    data() {
        return {
            cor : 'c1',
            x : 0,
            y : 0
        }
    },
    methods: {
        alterar(c){
            this.cor == 'c1' ? this.cor = c : this.cor = 'c1'
        },
        coordenadas(e){
            e.clientX > 600 ? this.cor = 'c4' : this.cor = 'c5';
            this.x = e.clientX;
            this.y = e.clientY;
        }
    },
})