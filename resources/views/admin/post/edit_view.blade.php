@extends('admin.layouts.app')

@section('title', 'Editar Posts')
@section('content')
    <h1 align='center'>Editar Post - {{ $post->title }}</h1>
    <div align='center'>

        <form action="{{ route('post.update', $post->id) }}" method="post" style="display: table-caption;"  enctype="multipart/form-data">
            @method('put')
            <!--put para edicao de dados-->
            @include('admin.post._partials.form')

        </form>

    </div>

@endsection
