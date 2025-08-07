<template>
    <div :class="estilo" role="alert">
        {{titulo}}
        <ul v-if="msg.dados">
            <span>{{msg.mensagem}}</span>
            <hr>
            <li v-for="e , key in msg.dados" :key="key">{{e[0]}}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:['tipo','msg', 'titulo'],
        computed:{
            estilo(){
                return 'alert alert-'+this.tipo
            }
        }
    }
</script>
