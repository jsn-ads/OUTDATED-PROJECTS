<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- card pesquisa ini -->
                <card-component titulo="Pesquisar Marcas">
                    <template v-slot:conteudo>
                        <div class="form-row">
                            <div class="col mb-3">
                                <input-container-component id="inputId" titulo="ID" id-help="idHelp" texto-ajuda="Opcional. Informe o ID" >
                                    <input type="number" class="form-control" id="inputId" aria-describedby="idHelp" placeholder="ID" v-model="buscar.id">
                                </input-container-component>
                            </div>

                            <div class="col mb-3">
                                <input-container-component id="inputMarca" titulo="Marca" id-help="idHelp" texto-ajuda="Opcional. Informe a Marca" >
                                    <input type="text" class="form-control" id="inputMarca" placeholder="Marca" v-model="buscar.nome">
                                </input-container-component>
                            </div>

                        </div>
                    </template>

                    <template v-slot:rodape>
                        <button type="submit" class="btn btn-primary btn-sm float-right" @click="pesquisar()">Pesquisar</button>
                    </template>

                </card-component>
                <!-- card pesquisa end -->

                <!-- card tabela ini -->
                <card-component titulo="Tabela de Marcas">

                    <template v-slot:conteudo>
                        <tabela-component
                            :dados="marcas.data"
                            :titulo="{
                                id:{
                                    titulo: 'ID',
                                    tipo:   'texto'
                                },
                                nome:{
                                    titulo: 'Nome',
                                    tipo:   'texto'
                                },
                                imagem:{
                                    titulo: 'Imagem',
                                    tipo:   'imagem'
                                },
                                created_at:{
                                    titulo: 'Data de criação',
                                    tipo:   'data'
                                }
                            }"
                            :visualizar="{
                                visivel: true ,
                                dataToggle: 'modal',
                                dataTarget: '#modal_marca_visualizar'
                            }"
                            :editar="{
                                visivel: true,
                                dataToggle: 'modal',
                                dataTarget: '#modal_marca_editar'
                            }"
                            :excluir="{
                                visivel: true ,
                                dataToggle: 'modal',
                                dataTarget: '#modal_marca_excluir'
                            }"
                        >
                        </tabela-component>
                    </template>

                    <!-- rodape init -->
                    <template v-slot:rodape>
                        <div class="row">
                            <div class="col-10">
                                <paginacao-component>
                                    <ul class="pagination">
                                        <li class="page-item" v-for="m , key in marcas.links" :key=key @click="paginacao(m)" :class="m.active ? 'page-item active':'page-item'">
                                            <a class="page-link" v-html="m.label"></a>
                                        </li>
                                    </ul>
                                </paginacao-component>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal_marca_adicionar">Adicionar</button>
                            </div>
                        </div>
                    </template>
                    <!-- rodape end -->

                </card-component>
                <!-- card tabela end -->

                <!-- modal init -->
                <modal-component id="modal_marca_adicionar" titulo="Adicionar Marca">

                    <template v-slot:alertas>
                        <alert-component tipo="danger" :msg="alertMensagem" titulo="Erro ao adicionar" v-if="alertStatus == 'erro'">

                        </alert-component>

                        <alert-component tipo="success" :msg="alertMensagem" titulo="Registro adicionado com sucesso" v-if="alertStatus == 'sucesso'">

                        </alert-component>
                    </template>

                    <template v-slot:conteudo>

                        <div class="form-group">
                            <input-container-component id="inputNovoMarca" titulo="Marca" id-help="idMarcaHelp" texto-ajuda="Insira uma nova Marca" >
                                <input type="text" class="form-control" id="inputNovoMarca" placeholder="Adicionar Marca" v-model="nomeMarca">
                            </input-container-component>
                        </div>

                        <div class="form-group">
                            <input-container-component id="inputImagemMarca" titulo="Imagem" id-help="idImagemHelp" texto-ajuda="Insira uma Imagem PNG" >
                                <input type="file" class="form-control-file" id="inputImagemMarca" @change="carregarImagem($event)">
                            </input-container-component>
                        </div>

                    </template>

                    <template v-slot:rodape>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" @click="salvar()">Salvar</button>
                    </template>

                </modal-component>
                <!-- modal end  -->

                <!-- modal visualizar init -->
                <modal-component id="modal_marca_visualizar" :titulo="'ID : '+$store.state.item.id">

                    <template v-slot:conteudo>
                            <input-container-component titulo="Imagem">
                                <img :src="'/storage/'+$store.state.item.imagem" alt="" v-if=($store.state.item.imagem)>
                            </input-container-component>

                            <input-container-component titulo="Marca">
                                <input type="text" class="form-control" :value="$store.state.item.nome" disabled>
                            </input-container-component>

                            <input-container-component titulo="Data de Criação">
                                <input type="text" class="form-control" :value="$store.state.item.created_at" disabled>
                            </input-container-component>
                    </template>

                    <template v-slot:rodape>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </template>

                </modal-component>
                <!-- modal visualizar end  -->

                <!-- modal excluir init -->
                <modal-component id="modal_marca_excluir" :titulo="'EXCLUIR MARCA ID ?'">

                    <template v-slot:alertas>
                        <alert-component tipo="success" :titulo="$store.state.att.mensagem" :msg="{mensagem:  $store.state.att.mensagem}" v-if="$store.state.att.status == 'sucesso'"></alert-component>
                        <alert-component tipo="danger" :titulo="$store.state.att.mensagem" :msg="{mensagem: $store.state.att.mensagem}" v-if="$store.state.att.status == 'erro'"></alert-component>
                    </template>

                    <template v-slot:conteudo v-if="$store.state.att.status != 'sucesso'">

                        <div class="row">
                            <div class="col-3">
                                <input-container-component titulo="ID">
                                    <input type="text" class="form-control" :value="$store.state.item.id" disabled style="text-align: center;">
                                </input-container-component>
                            </div>
                            <div class="col">
                                <input-container-component titulo="">
                                    <img :src="'/storage/'+$store.state.item.imagem" alt="" v-if=($store.state.item.imagem)>
                                </input-container-component>
                            </div>
                        </div>

                        <input-container-component titulo="Marca">
                            <input type="text" class="form-control" :value="$store.state.item.nome" disabled>
                        </input-container-component>

                    </template>

                    <template v-slot:rodape>
                        <button v-if="$store.state.att.status != 'sucesso'" type="button" class="btn btn-danger" @click="excluir()">Excluir</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </template>

                </modal-component>
                <!-- modal excluir end  -->

                <!-- modal editar -->
                <modal-component id="modal_marca_editar" titulo="Editar Marca">

                    <template v-slot:alertas>
                       <alert-component tipo="success" :titulo="$store.state.att.mensagem" :msg="{mensagem:  $store.state.att.mensagem}" v-if="$store.state.att.status == 'sucesso'"></alert-component>
                        <alert-component tipo="danger" :titulo="$store.state.att.mensagem" :msg="{mensagem: $store.state.att.mensagem}" v-if="$store.state.att.status == 'erro'"></alert-component>
                    </template>

                    <template v-slot:conteudo v-if="$store.state.att.status != 'sucesso'">

                        <div class="form-group">
                            <input-container-component id="inputEditarMarca" titulo="Marca" id-help="idEditarMarcaHelp" texto-ajuda="Insira uma nova Marca" >
                                <input type="text" class="form-control" id="inputEditarMarca" placeholder="Adicionar Marca" v-model="$store.state.item.nome">
                            </input-container-component>
                        </div>

                        <div class="form-group">
                            <input-container-component id="inputEditarImagemMarca" titulo="Imagem" id-help="idEditarImagemHelp" texto-ajuda="Insira uma Imagem PNG" >
                                <input type="file" class="form-control-file" id="inputImagemMarca" @change="carregarImagem($event)">
                            </input-container-component>
                        </div>

                    </template>

                    <template v-slot:rodape>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" @click="editar()" v-if="$store.state.att.status != 'sucesso'">Atualizar</button>
                    </template>

                </modal-component>
                <!-- modal editar  -->
            </div>
        </div>
    </div>
</template>

<script>

    import axios from "axios"

    export default{
        data (){
            return {
                urlBase : 'http://localhost:8000/api/lc/marca',
                urlPaginacao : '',
                urlFiltro : '',
                nomeMarca : '',
                arquivoImagem : [],
                alertStatus : '',
                alertMensagem : {},
                marcas : { data: []},
                buscar : { id : '', nome : ''},
                config : {
                    headers:{
                        'Content-Type': 'multipart/form-data',
                    }
                }
            }
        },
        methods: {
            editar(){

                let formData = new FormData();

                formData.append('nome', this.$store.state.item.nome)
                formData.append('_method','patch')

                if(this.arquivoImagem[0]){
                    formData.append('imagem', this.arquivoImagem[0])
                }

                let url = this.urlBase + '/' + this.$store.state.item.id

                axios.post(url, formData, this.config)
                            .then( response => {
                                this.$store.state.att.status = 'sucesso'
                                this.$store.state.att.mensagem = 'Marca Atualizada com sucesso'
                                inputImagemMarca.value = ''
                                this.carregarLista()
                            })
                            .catch( errors => {
                                this.$store.state.att.status = 'erro'
                                this.$store.state.att.mensagem = errors.response.data.errors.nome[0]
                            })

            },
            // Metodo para excluir marca
            excluir(){
                let confirmacao = confirm('Tem certeza que deseja excluir a marca : '+this.$store.state.item.nome)

                if(!confirmacao){
                    return false;
                }

                let formData = new FormData()

                formData.append('_method','delete')

                let url = this.urlBase+'/'+this.$store.state.item.id

                axios.post(url,formData)
                    .then(response => {
                        this.$store.state.att.status = 'sucesso'
                        this.$store.state.att.mensagem = 'Marca excluida com sucesso'
                        this.carregarLista()
                    })
                    .catch(errors =>{
                        this.$store.state.att.status = 'erro'
                        this.$store.state.att.mensagem = errors.response.data.erro
                    })


            },
            // Metodo para pesquisar marca
            pesquisar(){

                let filtro = ''

                for(let item in this.buscar){
                    if(this.buscar[item]){
                        if( filtro != ''){
                            filtro += ";"
                        }

                        filtro += item + ':like:' + this.buscar[item]
                    }
                }

                if(filtro !=''){
                   this.urlPaginacao = 'page=1'
                   this.urlFiltro = '&filtro='+filtro
                }else{
                   this.urlFiltro = '';
                }

                this.carregarLista();

            },
            //Metodo para carrega lista de Marcas
            carregarLista(){

                let url = this.urlBase +'?'+ this.urlPaginacao + this.urlFiltro

                axios.get(url , this.config)
                    .then(response=>{
                        this.marcas = response.data
                    })
                    .catch( errors =>{
                        console.log(errors)
                    })

                       console.log(this.$store.state.att);
            },
            // Metodo para carregar conteudo da paginação
            paginacao(m){
                if(m.url){

                    this.urlPaginacao = m.url.split('?')[1];

                    this.carregarLista()
                }
            },
            //Metodo para carrega imagem ao salvar Marca
            carregarImagem(e){
                this.arquivoImagem = e.target.files
            },
            //Metodo para salvar Marca
            salvar(){

                //formulario de envio para API

                let formData = new FormData();

                formData.append('nome', this.nomeMarca)
                formData.append('imagem', this.arquivoImagem[0])

                axios.post(this.urlBase , formData , this.config)
                    .then( response => {
                        this.alertStatus = 'sucesso'
                        this.alertMensagem = response

                    }).catch( errors => {
                        this.alertStatus = 'erro'
                        this.alertMensagem = {
                            mensagem : errors.response.data.message,
                            dados : errors.response.data.errors
                        }
                    })
            }
        },
        mounted(){
            this.carregarLista()
        }
    }
</script>
