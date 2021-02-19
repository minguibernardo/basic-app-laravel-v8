<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{ //fazendo uma declaração importação varios controler de forma organizada
    PostController
};



//Rotas do type get

Route::get('/post', [PostController::class, 'list'])->middleware(['auth'])->name('post.list');   //para listar usamos get
Route::get('/post/add', [PostController::class, 'add'])->middleware(['auth'])->name('post.add'); //enviar dados no banco dedados
Route::get('/post/about', [PostController::class, 'about'])->middleware(['auth'])->name('post.about');


//Rota da home principal
Route::get('/', function () {
  return view('welcome');
}); //para listar usamos get


//Route type post
Route::post('/post', [PostController::class, 'store'])->middleware(['auth'])->name('post.store'); // rota para o method action  do nosso formulario fazer o cadastro na BD
Route::any('/post/search', [PostController::class, 'search'])->middleware(['auth'])->name('post.search'); // routa para pesquisa
//pegando dado na url
Route::get('/post/{id}', [PostController::class, 'show'])->middleware(['auth'])->name('post.show');

//rota para a  pagina atualizar
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->middleware(['auth'])->name('post.edit');

//routa para edicao de registro
Route::put('/post/{id}', [PostController::class, 'update'])->middleware(['auth'])->name('post.update');

//deletando um item com http delete
Route::delete('/post/{id}', [PostController::class, 'deleted'])->middleware(['auth'])->name('post.deleted');

///routa para o painel de control
Route::get('/dashboard', function () {  return view('dashboard');})->middleware(['auth'])->name('dashboard');

//
require __DIR__ . '/auth.php';
