<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Mockery\Undefined;

class PostController extends Controller
{

    //a função que chamamos na rota ^^ pertecente ao contralador post
    public function list()
    {


        $posts = Post::latest()->paginate(); //ou all(); // paginate utilizamos para paginação da nossa lista caso haja varios itens
        //como ordenar uma lista no laravel vc pode usar ::orderBy('id', 'DESC')/OU ASC OU ainda o latest
        //dd($allpost) ; depurar uma variavel

         return view('admin.post.list_view', compact('posts'));
    }
    // add function return view
    public function add()
    {

        $add = 'Save Post';
        return view('admin.post.add_view', compact('add'));
    }

    // about function return view
    public function about()
    {

        return view('admin.post.about_view');
    }

    //fuction que recebe as informacao do formulario via post e manda para BD

    public function store(storeUpdatePost  $request)
    {

        // dd($response->all()); // se quiser pegar todos dados dentro da requisicao basta dizer all();

        //pegando o nosso model  Post
        Post::create($request->all()); //inserindo tudo de uma so vez com metodo all();  //ou um por um se precisar $response->title,

        return redirect()->route('post.list')->with('message', 'O post foi adicionado com sucesso'); //leva para pagina de listagem
    }

    public function show($id)
    {

        // dd($id);
        // Post::where('id', $id)->get(); //retornado uma collection de array de dados


        if (!$post = Post::find($id)) { //o find retorna o primero item da tabela


            return redirect()->route('post.list');
        }

        //$post = Post::where('id', $id)->first(); //retornado o primero item da tabela pode se aplicar url

        return view('admin.post.show', compact('post'));
    }

    public function deleted($id)
    {

        // dd("deleted o post --- {$id}");

        if (!$post = Post::find($id))

            return redirect()->route('post.list');
        $post->delete();
        return redirect()->route('post.list')->with('message', 'O post foi deletado com sucesso');
    }

    public function edit($id)
    {

        $edit = 'Save Edit';
        if (!$post = Post::find($id)) { // sse post id for igual ao id entao passa se nao volta para home

            return redirect()->back();
        }

        return view('admin.post.edit_view', compact('post','edit'));
    }

    public function update(StoreUpdatePost $request, $id)
    {

        if (!$post = Post::find($id)) {

            return redirect()->back();
        }

        $post->update($request->all()); //passando todos os registros

        return redirect()->route('post.list')->with('message', 'O post foi editado com sucesso');

        //dd("Editando post: {$post->id}");
        //return view('admin.post.edit_view', compact('post'));

    }

    public function search(Request $request)
    {
         //->toSql(); // debugando a query usa o toSql juntamente com o dd para exbicao de resultado

          $filitros = $request->except('_token');//except: pega todo o array da requisicao menos o _token

          $palavra = $request->search; //pega a palavra chave da pesquisa

          $posts = Post::where('title','LIKE', "%{$request->search}%")
         ->orWhere('content','LIKE',"%{$request->search}%")
         ->paginate();



         return view('admin.post.list_view', compact('posts','palavra','filitros'));

    }
}
