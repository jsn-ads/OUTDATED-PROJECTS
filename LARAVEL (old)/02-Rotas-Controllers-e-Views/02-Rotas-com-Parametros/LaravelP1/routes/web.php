<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function(){
    return view('teste');
});

//carrega apenas uma pagina sem trazer informacoes ex: login/formularios

Route::view('/teste2','teste2');

//rotas com parametros

Route::get('/user/{id}', function($args){
    echo "Usuario selecionado : ".$args;
});