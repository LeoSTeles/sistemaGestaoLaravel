<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\TesteController;
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
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre', [SobreController::class, 'sobre'])->name('site.sobre');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){return "Login";})->name('site.login');

//Agrupando rotas por um prefixo
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return "Clientes";})->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class,'index'])->name('app.fornecedores');
    Route::get('/produtos', function(){return "Produtos";})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');


//Gerando rota de fallback, ou seja, quando a página não é encontrada

Route::fallback(function(){
    echo 'A rota indicada não foi encontrada. <a href="'.route('site.index').'">Clique aqui </a> para voltar para a página inicial';
});

//Passando parâmetros através da própria rota
//Caso eu queira tornar o parâmetro opcional, passo uma ? ao lado direito do mesmo e passar um valor padrão caso não seja informado
Route::get('/contato/{nome}/{categoria_id}',
    function(
        string $nome = "Desconhecido", 
        int $categoria_id = 1 //1 - Informação
) {
    echo "Nome: ". $nome . "\n". "Categoria: ". $categoria_id;
}
)->where('nome', '[A-Za-z]+')->where('categoria_id', '[0-9]+');


