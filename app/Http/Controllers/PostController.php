<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //a função que chamamos na rota ^^ pertecente ao contralador post
    public function list(){


        $all_post = Post::get(); //ou all();
        ///dd($allpost) ; depurar uma variavel

        return view('admin.post.list_view', compact('all_post')); //carregando a view

    }
     // add funcion return view
    public function add(){

        return view('admin.post.add_view');

    }

    // about funcion return view
    public function about(){

        return view('admin.post.about_view');
    }

    //fuction que recebe as informacao do formulario via post e manda para BD

    public function store(storeUpdatePost  $response){

         // dd($response->all()); // se quiser pegar todos dados dentro da requisicao basta dizer all();

         //pegando o nosso model  Post
          Post::create($response->all()); //inserindo tudo de uma so vez com metodo all();  //ou um por um se precisar $response->title,

          return redirect()->route('post.list'); //leva para pagina de listagem
    }
}
