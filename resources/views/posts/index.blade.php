@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    @guest
    @if (Route::has('login'))
    @endif
    @else
    <div class="container-fluid">

        <h4>Bienvenido {{ auth()->user()->name }} </h4>
     </div>
    <td class="container-fluid" colspan=3 ><a href="{{ 'posts/60bd7633ace41a6ecb766753 '}}" class="btn btn-info" style="text-align:right">mis publicaciones</a></td>
    @endguest 
   
    @foreach ($posts as $post)
    
    <div class="row aling-items-center h-100">
            <div class="card col-md-8 mx-auto">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ url('/posts/' .  $post->id) }}">
                        {{ $post->title}}
                    </a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $posts->links() }}
@endsection


    

