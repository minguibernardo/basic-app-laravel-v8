@extends('admin.layouts.app')

@section('title', 'BasicApp')
@section('content')
    <h1 align='left'>Bem vindo ao BasicApp</h1>
    <ul align="left">
        <li><a href="{{ route('post.add') }}">Create new post</a></li>
        <!--pegando o caminho dinamicamente com o helper Route-->
        <li><a href="{{ route('post.about') }}">About</a></li>
        <li style="width: 0%; position: relative; top: 8px">
            <form action="{{ route('post.search') }}" method="post">
                @csrf
                <input type="text" name="search" placeholder="pesquisar aqui titulo e etc...">
                <button type="submit" style="position: absolute;top: 0;left: 178px;">Pesquisar</button>
            </form>
        </li>
    </ul>
    <hr>

    @if (isset($palavra))

        <p align='left'>Resultado obtido da palavra <u><strong> {{ $palavra }}</strong></u></p>

    @else

        <p align='left'>Olá temos uma sugestão para sí <u><strong> Pesquisa alguma coisa no pesquisador!!</strong></u></p>

    @endif


    @if (session('message'))

        <p align='left' style='color:orangered'>{{ session('message') }}</p>
        <!--mostrando as message guardada no na session flash-->

    @endif

    <div align='left'>

        @foreach ($posts as $post)

           <p><img src="{{ url("storage/{$post->image}") }}" alt="" width="90"></p>
            <p align='left'>{{ $post->title }}</p>
            <p align='left'>{{ $post->content }}</p>
            <br>
            &nbsp; &nbsp;[<a href="{{ route('post.show', $post->id) }}"> <u>Show</u></a>]
            &nbsp; &nbsp;[<a href="{{ route('post.edit', $post->id) }}"> <u>Edit</u></a>]

            <hr>
        @endforeach

        @if (isset($filitros))
            <span style="display: flex;justify-content: center;align-items: center;">
                {{ $posts->appends($filitros)->links() }} </span>
        @else
            <span style="display: flex;justify-content: center;align-items: center;"> {{ $posts->links() }} </span>
        @endif
    </div>

@endsection
