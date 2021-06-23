@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row align-items-center h-100">
        <div class="card col-md-8 mx-auto">
            <h1>bienvenido</h1>
            <img src="{{ Storage::url($post->image) }}" alt="imagen" class="card-img-top">
            <div class="card-body">
                <h5 class="card-tittle">
                        {{$post->title}}
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    {{ $post->created_at }}
                </h6>
                <p class="card-text">
                    {{$post->content}}
                </p>
                
                
                @guest
                 <!-- 
                si el usuario no a iniciado sesion solo se le mostrara el botton para poder iniciar sesion y ver los comentarios     
                -->   
                    <h5>
                        inicia seccion para ver los comentarios 
                    </h5>
                    @if (Route::has('login'))
               
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('iniciar seccion') }}</a>
                                </li>
                                <a href="{{ url('/') }}"  class="card-link">
                                todas las publicaciones
                                </a>
                    @endif

                @else

                <!--
                aqui se va a mostrar el cuadro de comentarios y los comentarios siempre y cuando el usuario a iniciado sesion     
                --> 

                   <div class="formulario">         
                    <form class="cuadro de comentarios">
                    <textarea name="comment" rows=5 cols=100>
                        comentarios
                    </textarea>
                        </form> 
                            <h2>
                                 Comentarios
                            </h2>
                            <p>
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  <br>      
                                <br>
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </p>   
                            </li>
                                <a href="{{ url('/') }}"  class="card-link">
                                todas las publicaciones
                                </a>
                    </div>  
                @endguest 
            </div>  
        </div>
    </div>
</div>


@endsection