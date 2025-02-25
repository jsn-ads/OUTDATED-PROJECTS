<?php

use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//visualizar listar
Route::get('/notes', [NoteController::class, 'all']);
//visualizar post
Route::get('/note/{id}', [NoteController::class, 'one']);

//adicionar
Route::post('/note', [NoteController::class, 'new']);

//atualizar edit
Route::put('/note/{id}', [NoteController::class, 'edit']);

//deletar
Route::delete('/note/{id}',[NoteController::class, 'delete']);




