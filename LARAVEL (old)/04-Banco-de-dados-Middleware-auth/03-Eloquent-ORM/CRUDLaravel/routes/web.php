<?php

use App\Http\Controllers\Tarefas\TarefasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PessoaController;
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


//rota crianda com Resource parametros 1 "prefix" paramentro 2 "controller" , eles ja cria todas a totas get e post
/*
    GET - /pessoa           - index    - pessoa.index      - Listagem
    
    GET - /pessoa/create    - create   - pessoa.create     - Tela de Adição
    POST - /pessoa          - store    - pessoa.store      - Acao de Adicao

    GET - /pessoa/{id}      - show     - pessoa.show       - Item Individual 

    GET - /pessoa/{id}/edit - edit     - pessoa.edit       - Tela de Edicao
    PUT - /pessoa/id        - update   - pessoa.update     - Acao de Edicao

    DELETE - /pessoa/{id}   - destroy  - pessoa.destroy    - Acao de excluir


*/

Route::resource('pessoa',PessoaController::class);


Route::fallback(function(){
    return view('404');
});