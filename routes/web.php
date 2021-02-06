<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{ //fazendo uma declaração importação varios controler de forma organizada
    PostController
};



//Rotas do type get

Route::get('/post', [PostController::class, 'list'])->name('post.list');   //para listar usamos get
Route::get('/post/add',[PostController::class, 'add'])->name('post.add'); //enviar dados no banco dedados
Route::get('/post/about', [PostController::class, 'about'])->name('post.about');
//Rota da home principal
Route::get('/', function () {  return view('welcome');}); //para listar usamos get


//Route type post
Route::post('/post', [PostController::class, 'store'])->name('post.store'); // rota para o method action  do nosso formulario fazer o cadastro na BD

//pegando dado na url
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

//deletando um item com http delete
Route::delete('/post/{id}', [PostController::class, 'deleted'])->name('post.deleted');

