<?php

use App\Http\Controllers\Adm\ConfigController;
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

Route::prefix('/config')->group(function(){

    Route::get('/', [ConfigController::class,'index']);
    Route::post('/', [ConfigController::class,'index']);
    Route::get('/info', [ConfigController::class,'info']);
    Route::get('/permissoes', [ConfigController::class,'permissoes']);

});