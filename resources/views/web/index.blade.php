@extends('web.master')

@section('content')
    <h1> Contenido inicial </h1>
    @{{message}}

    <ul>
        <li v-for="post in posts">
            @{{post}}
        </li>
    </ul>
@endsection