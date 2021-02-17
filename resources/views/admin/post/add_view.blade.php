@extends('admin.layouts.app')

@section('title', 'Criar novo Posts')
@section('content')
    <h1 align='center'>Criar novos Posts</h1>
    <div align='center'>

        <form action="{{ route('post.store') }}" method="post" style="display: table-caption;">
            @include('admin.post._partials.form')
        </form>

    </div>
@endsection
