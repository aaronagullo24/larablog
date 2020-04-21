
@extends('dashboard.post.master')

@section('content')

        @csrf
    
        <div class="form-group">
            <label for="title">Titulo</label>
            <input readonly class="form-control" type="text" id="title" name="title" value={{$post->title}}>
            @error('title')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    
    
        <div class="form-group">
            <label for="url_clean">url limpia</label>
            <input  readonly class="form-control" type="text" id="url_clean" name="url_clean" value={{$post->url_clean}}>
        </div>
       
        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea readonly class="form-control" id="content" name="content" row="3">{{$post->content}}</textarea>
        </div>
    
        <input type="submit" value="Enviar" class="btn btn-primary">
    
@endsection