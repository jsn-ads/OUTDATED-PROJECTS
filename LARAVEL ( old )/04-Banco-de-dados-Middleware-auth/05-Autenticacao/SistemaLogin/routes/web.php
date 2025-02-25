<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('/')->group(function(){
    Route::get('/',[InicioController::class, 'index'])->name('inicio');
});

Route::prefix('/register')->group(function(){
    Route::get('/', [RegisterController::class,'index'])->name('register');
    Route::post('/' , [RegisterController::class, 'register']);
});


Route::prefix('/login')->group(function(){
    Route::get('/' , [LoginController::class,'index'])->name('login');
    Route::post('/' , [LoginController::class,'authenticate']);
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});




Route::get('/home', [HomeController::class, 'index'])->name('home');