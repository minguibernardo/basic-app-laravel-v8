@if ($errors->any())

       <span>
           @foreach ($errors->all() as $erro)

           <p style="color:red">{{$erro}}</p>

           @endforeach
       </span>

    @endif

    @csrf
    <input type="text" name="title" id="title" placeholder="titulo" value="{{$post->title ?? old('title')}}"> <!--old() e um helper que criar sessao do tipo flash que mentem os dados nos inptus temporariamente-->
    <textarea id="content" name="content" rows="4" cols="25" placeholder="Escreva uma descricao aqui" style="margin-top: 20px;">{{$post->content ?? old('content')}}</textarea>
    <button type="submit" id="send" value="send" style="margin-top: 20px;"> {{$edit ?? $add}} </button>
    <a href="{{route('post.list')}}" id="send" value="send" style="margin-top: 20px;">voltar</a>
