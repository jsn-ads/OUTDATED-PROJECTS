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

Route::get('/user/{nome}', function($nome){
    echo 'esse e o nome:'.$nome.' do usuario';
})->where('nome','[a-z]+');

Route::get('/user/{id}', function($id){
    echo 'esse e o id:'.$id.' do usuario';
});

Route::get('/update/{id}', function($id){
    echo 'esse e o id:'.$id;
});