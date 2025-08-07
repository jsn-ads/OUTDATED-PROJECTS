const vm = new Vue({
    el:"#app",
    data() {
        return {
            pacientes : [
                {
                    nome : 'Jose Neto',
                    idade : 32,
                    plano : 'Ouro'
                }
            ]
        }
    },
    methods: {
       adicionar(){
           this.pacientes.push({
               nome : inputNome.value,
               idade : inputIdade.value,
               plano : inputPlano.value
           });
        }
    },
    computed : {
        ultimoPaciente(){
            
            let i = this.pacientes.length -1

            let ultimo = "Paciente : "+this.pacientes[i].nome + " / Idade : " +this.pacientes[i].idade +" / Plano : "+ this.pacientes[i].plano

            return ultimo

        },
        planoOuro(){

            return this.pacientes.filter(item => item.plano == 'Ouro')

        }
    }
})