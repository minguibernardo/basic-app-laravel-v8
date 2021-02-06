<h1 align='center'>Bem vindo ao BasicApp</h1>




<ul style="display:flex;    width: 15%;
display: flex;
align-items: center;
text-align: center;
justify-content: space-between;
margin-left: 40%;" align="center">
    <li><a href="{{route('post.add')}}">Create new post</a></li> <!--pegando o caminho dinamicamente com o helper Route-->
    <li><a href="{{route('post.about')}}">About</a></li>
</ul>
<hr>

@if (session('message'))

<p align='center' style='color:orangered'>{{ session('message')}}</p>  <!--mostrando as message guardada no na session flash-->

@endif

<div align='center' style="margin:5% 40%;">

    @foreach ($all_post as $post)

<p align='left'>{{ $post->title }} &nbsp; &nbsp;[<a href="{{route('post.show', $post->id)}}"> <u>Show me</u></a>]</p>
<p align='left'>{{ $post->content }}</p>
@endforeach

</div>
