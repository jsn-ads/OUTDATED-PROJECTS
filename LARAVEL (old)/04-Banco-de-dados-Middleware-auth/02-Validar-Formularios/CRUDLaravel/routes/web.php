<?php

use App\Http\Controllers\Tarefas\TarefasController;
use App\Http\Controllers\HomeController;
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

Route::get('/', HomeController::class);

Route::prefix('/tarefas')->group(function(){

    Route::get('/' , [TarefasController::class,'index'])->name('tarefas.index');                 //Listagem 

    Route::get('add', [TarefasController::class,'add'])->name('tarefas.add');                    //Tela de Adicao
    Route::post('add', [TarefasController::class,'addAction']);                                  //Acao de Adicao

    Route::get('edit/{id}', [TarefasController::class,'edit'])->name('tarefas.edit');            //Tela de Edicao
    Route::post('edit/{id}', [TarefasController::class,'editAction']);                           //Acao de Edicao

    Route::get('del/{id}', [TarefasController::class,'del'])->name('tarefas.del');                //Tela de Excluir

    Route::get('status/{id}', [TarefasController::class,'status'])->name('tarefas.status');      //Marcar resolvido/não

});


Route::fallback(function(){
    return view('404');
});