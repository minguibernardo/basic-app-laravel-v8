<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{ //fazendo uma declaração importação varios controler de forma organizada
    PostController
};



//Rotas do type get

Route::get('/post', [PostController::class, 'list'])->name('post.list');   //para listar usamos get
Route::get('/post/add', [PostController::class, 'add'])->name('post.add'); //enviar dados no banco dedados
Route::get('/post/about', [PostController::class, 'about'])->name('post.about');


//Rota da home principal
Route::get('/', function () {
  return view('welcome');
}); //para listar usamos get


//Route type post
Route::post('/post', [PostController::class, 'store'])->name('post.store'); // rota para o method action  do nosso formulario fazer o cadastro na BD
Route::any('/post/search', [PostController::class, 'search'])->name('post.search'); // routa para pesquisa
//pegando dado na url
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

//rota para a  pagina atualizar
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');

//routa para edicao de registro
Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

//deletando um item com http delete
Route::delete('/post/{id}', [PostController::class, 'deleted'])->name('post.deleted');

///routa para o painel de control
Route::get('/dashboard', function () {  return view('dashboard');})->middleware(['auth'])->name('dashboard');

//
require __DIR__ . '/auth.php';
