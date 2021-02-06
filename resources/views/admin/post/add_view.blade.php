<h1 align='center'>Criar novos Posts</h1>
<div align='center'>


    @if ($errors->any())

       <span>
           @foreach ($errors->all() as $erro)

           <p style="color:red">{{$erro}}</p>

           @endforeach
       </span>

    @endif


    <form action="{{route('post.store')}}" method="post" style="display: table-caption;">
        @csrf
        <input type="text" name="title" id="title" placeholder="titulo" value="{{old('title')}}"> <!--old() e um helper que criar sessao do tipo flash que mentem os dados nos inptus temporariamente-->
        <textarea id="content" name="content" rows="4" cols="25" placeholder="Escreva uma descricao aqui" style="margin-top: 20px;">
            {{old('content')}}
        </textarea>
        <button type="submit" id="send" value="send" style="margin-top: 20px;">Send Post</button>
    </form>


</div>

