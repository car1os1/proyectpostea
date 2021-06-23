@extends('layouts.app')
@section('content') 
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id_mensaje</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notificaciones as  $notificacion)
                    <tr>
                        <th scope="col">{{$notificacion -> id}}</th>
                        <th scope="col">{{$notificacion -> created_at}}</th>
                        <th scope="col">new post</th>
                        <th scope="col">---</th>
                    </tr>

                @php
                   $notificacion->markAsRead(); 
                @endphp
                @endforeach
            </tbody>
        </table>
    </body>
    </html>

@endsection