const vm = new Vue({
    el:"#app",
    data() {
        return {
            paciente: "",
            pacientes : [
               {
                   nome : "Jose Alves",
                   idade : 32
               },
               {
                   nome : "Julia Teresa",
                   idade : 24
               },
               {
                    nome  : "Joao Pedro",
                    idade : 15
               },
               {
                    nome  : "Cristina Monik",
                    idade : 34
               },
               {
                    nome  : "Natalia ALmeida",
                    idade : 15
               }
           ],
           lista : []
        }
    },
    methods: {
      
    },
    computed : {
       
    },
    watch :{
        paciente(value){
            this.lista = this.pacientes.filter(p => p.nome.match(value));
        }
    }
})