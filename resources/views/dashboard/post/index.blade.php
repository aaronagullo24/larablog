@extends('dashboard.post.master')

@section('content')

<a class="btn btn-success mt-3 mb-3" href="{{route('post.create')}}">
    Crear
</a>

<table class="table">
    <thead>
        <tr>
            <td>
                Identificador
            </td>
            <td>
                Titulo
            </td>
            <td>
                Posteado
            </td>
            <td>
                Creacion
            </td>
            <td>
                Actualizacion
            </td>
            <td>
                acciones
            </td>
        </tr>
    </thead>

    <tbody>

        @foreach ($posts as $post)
        <tr>
            <td>
                {{$post->id}}
            </td>
            <td>
                {{$post->title}}
            </td>
            <td>
                {{$post->posted}}
            </td>
            <td>
                {{$post->created_at->format('d-m-y')}}
            </td>
            <td>
                {{$post->update_at}}
            </td>
            <td>
                
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{$posts->links()}}
@endsection