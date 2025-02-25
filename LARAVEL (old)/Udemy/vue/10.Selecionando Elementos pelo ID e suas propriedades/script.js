const vm = new Vue({
    el:"#app",
    data() {
        return {
            vnome  : "",
            vcargo : "",
            vbv    : "",
        }
    },
    methods: {
        capturar(){
            this.vnome = nome.value;
            this.vcargo = cargo.value;
            this.vbv = bv.innerHTML;
        }
    },
})