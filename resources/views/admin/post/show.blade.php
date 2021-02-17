@extends('admin.layouts.app')


@section('title', 'Visualizar Detalhes')
@section('content')

    <div align='center' style="margin:5% 40%;">

        <p align='left'>
        <h1>{{ $post->title }}</h1> &nbsp; &nbsp;[<a href="{{ route('post.show', $post->id) }}"> <u>Edit</u></a>]</p>
        <p align='center'>{{ $post->content }}</p>

        <form action="{{ route('post.deleted', $post->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-primary">Delete {{ $post->title }}</button>
            <a href="{{ route('post.list') }}" id="send" value="send" style="margin-top: 20px;">voltar</a>
        </form>

    </div>

@endsection
