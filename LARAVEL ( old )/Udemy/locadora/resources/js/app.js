/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';

import Vuex from 'Vuex';

Vue.use(Vuex)

const store = new Vuex.Store({
    state:{
        item:{},
        att:{
            status : '',
            mensagem : ''
        }

    }
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Registrar componentes

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('login-component', require('./components/Login.vue').default);

Vue.component('home-component', require('./components/Home.vue').default);

Vue.component('marca-component', require('./components/Marca.vue').default);

Vue.component('input-container-component', require('./components/inputContainer.vue').default);

Vue.component('tabela-component', require('./components/Tabela.vue').default);

Vue.component('card-component', require('./components/Card.vue').default);

Vue.component('modal-component', require('./components/Modal.vue').default);

Vue.component('alert-component', require('./components/Alert.vue').default);

Vue.component('paginacao-component', require('./components/Paginacao.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.filter('formataDataTempoGlobal', function(e){

    if(!e) return ''

    e = e.split('T')

    let data = e[0];
    let tempo = e[1];

    //formatando data

    data = data.split('-')
    data = data[2]+ '/' +data[1]+ '/' +data[0]

    //formatando tempo

    tempo = tempo.split('.')
    tempo = tempo[0]

    return data + ' ' + tempo
})

const app = new Vue({
    el: '#app',
    store
});
