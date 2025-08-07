<?php

use App\Http\Controllers\AppClienteController;
use App\Http\Controllers\AppFornecedorController;
use App\Http\Controllers\AppHomeController;
use App\Http\Controllers\AppProdutoController;
use App\Http\Controllers\AppPedidoControlller;
use App\Http\Controllers\AppPedidoProdutoController;
use App\Http\Controllers\AppProdutoDetalheController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreController;

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

// rota inicial
Route::get('/',[PrincipalController::class, 'index'])->name('inicio');

// rota sobre
Route::get('/sobre',[SobreController::class, 'index'])->name('sobre');

// rota login com prefix
Route::prefix('/login')->group(function(){
    Route::get('/{valor?}', [LoginController::class, 'index'])->name('login');
    Route::post('/',[LoginController::class, 'autenticar'])->name('login');
});

// rota contato com prefix
Route::prefix('/contato')->group(function(){
    Route::get('/', [ContatoController::class, 'index'])->name('contato');
    Route::post('/',[ContatoController::class, 'add'])->name('contato');
});

// rota protegida por autenticação
Route::middleware('autenticacao: padrao , usuario')->prefix('/app')->group( function(){

    // inicio
    Route::get('/', [AppHomeController::class, 'index'])->name('app');

    // rota fornecedor
    Route::get('/fornecedor/', [AppFornecedorController::class,'index'])->name('app.fornecedor');
    Route::get('/fornecedor/adicionar', [AppFornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/add', [AppFornecedorController::class, 'add'])->name('app.fornecedor.add');
    Route::get('/fornecedor/listar/{msg?}', [AppFornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/editar/{id}',[AppFornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}',[AppFornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    // rota produto resource
    Route::resource('produto', AppProdutoController::class);

    // rota produto detalhe
    Route::resource('produto_detalhe', AppProdutoDetalheController::class);

    // rota cliente
    Route::resource('pedido', AppPedidoControlller::class);

    // rota de pedido
    Route::resource('cliente', AppClienteController::class);

    // rota pedido produto customizada
    Route::get('pedido_produto/create/{pedido}',[AppPedidoProdutoController::class,'create'])->name('pedido_produto.create');
    Route::post('pedido_produto/store/{pedido}',[AppPedidoProdutoController::class, 'store'])->name('pedido_produto.store');
    Route::delete('pedido_produto/destroy/{pedidoProduto}/{pedido}',[AppPedidoProdutoController::class, 'destroy'])->name('pedido_produto.destroy');

    // rota login sair
    Route::get('/sair', [LoginController::class,'sair'])->name('app.sair');
});

//caso não encontre nenhuma rota
Route::fallback(function(){
    echo "Pagina não encontrada <a href=".route('inicio')."> clique aqui </a> para voltar a tela inicial";
});

