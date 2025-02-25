const vm = new Vue({
    el:"#app",
    data() {
        return {
            numA: 10,
            numB: 15,
        }
    },
    methods: {
        somar(){
            return this.numA + this.numB
        }
    },
})