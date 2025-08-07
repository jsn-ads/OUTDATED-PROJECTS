<template>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" v-for="t , key in titulo" :key="key"><span class="strong">{{t.titulo}}</span></th>
                    <th v-if="(visualizar.visivel || editar.visivel || excluir.visivel)"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="obj , key in dadosFiltrados" :key="key">
                    <td v-for="valor , chave in obj" :key="chave">
                        <span v-if="titulo[chave].tipo == 'texto'">{{valor}}</span>
                        <span v-if="titulo[chave].tipo == 'data'">{{valor | formataDataTempoGlobal}}</span>
                        <span v-if="titulo[chave].tipo == 'imagem'">
                            <img :src="'/storage/'+valor" width="40px" height="40px">
                        </span>
                    </td>
                    <td v-if="(visualizar.visivel || editar || excluir.visivel)">
                        <button class="btn btn-outline-primary btn-sm" :data-toggle="visualizar.dataToggle" :data-target="visualizar.dataTarget" v-if="(visualizar.visivel)" @click="setStore(obj)">visualizar</button>
                        <button class="btn btn-outline-success btn-sm" :data-toggle="editar.dataToggle" :data-target="editar.dataTarget" v-if="(editar.visivel)" @click="setStore(obj)">editar</button>
                        <button class="btn btn-outline-danger btn-sm" :data-toggle="excluir.dataToggle" :data-target="excluir.dataTarget" v-if="(excluir.visivel)" @click="setStore(obj)">excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['dados','titulo','visualizar','editar','excluir'],
        computed:{
            dadosFiltrados(){

                let dadosFiltrados = [];

                let campos = Object.keys(this.titulo)

                this.dados.map((item, chave) =>{
                    let itemFiltrado = {}
                    campos.forEach(campo =>{
                        itemFiltrado[campo] = item[campo]
                    })

                    dadosFiltrados.push(itemFiltrado)
                })

                return dadosFiltrados
            }
        },
        methods:{
            setStore(obj){
                this.$store.state.att.status = ''
                this.$store.state.att.mensagem = ''
                this.$store.state.item = obj
            }
        }
    }
</script>
