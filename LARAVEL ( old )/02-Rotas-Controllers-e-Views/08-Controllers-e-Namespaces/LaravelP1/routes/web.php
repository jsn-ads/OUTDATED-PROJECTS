<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Usuario\UserController;
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

Route::get('/',HomeController::class);

Route::prefix('/user')->group(function(){

    Route::get('/', [UserController::class,'index']);
    Route::get('/add/{id}', [UserController::class,'add']);
    Route::get('/del/{id}', [UserController::class,'del']);

});

Route::fallback(function(){
    return view('404');
});