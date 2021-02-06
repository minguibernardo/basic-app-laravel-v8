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

<div align='center' style="margin:5% 40%;">

    @foreach ($all_post as $item)

<p align='left'>{{ $item->title }}</p>
<p align='left'>{{ $item->content }}</p>
@endforeach

</div>
