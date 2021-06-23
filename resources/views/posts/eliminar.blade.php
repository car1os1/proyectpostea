@extends('layouts.app')

@section('content')


<div class="container-fluid">

    <body>
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>

        </tr>
    </body>
    <h4>Bienvenido {{ auth()->user()->name }} </h4>
    <td class="container-fluid" colspan=3 ><a href="{{ 'posts/60bd7633ace41a6ecb766753 '}}" class="btn btn-info" style="text-align:right">mis publicaciones</a></td>
    <td class="container-fluid" colspan=3 ><a href="{{ 'posts/60bd7633ace41a6ecb766753 '}}" class="btn btn-info" style="text-align:right">editar datos</a></td>
    <td class="container-fluid" colspan=3 ><a href="{{ 'posts/60bd7633ace41a6ecb766753 '}}" class="btn btn-info" style="text-align:right">eliminar mi cuenta</a></td>

 </div>

@endsection