<?php

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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Forma de passar uma rota instanciando um controller e uma função do mesmo
Route::get('/', [PrincipalController::class, 'principal']);
Route::get('/sobre', [SobreController::class, 'sobre']);
Route::get('/contato', [ContatoController::class, 'contato']);


//Forma original do projeto 
// Route::get('/', function () {
//     return view('welcome');
// });
