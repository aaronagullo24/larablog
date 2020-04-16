<link rel="stylesheet" href="{{asset("css/app.css")}}">
<script src="{{ asset("js/app.js")}}"></script>

<div class="container">
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
<form action="{{route("post.store")}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Titulo</label>
        <input class="form-control" type="text" id="title" name="title">

        @error('title')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>


    <div class="form-group">
        <label for="url_clean">url limpia</label>
        <input class="form-control" type="text" id="url_clean" name="url_clean">
    </div>
   
    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea class="form-control" id="content" name="content" row="3"></textarea>
    </div>

    <input type="submit" value="Enviar" class="btn btn-primary">

</form>
</div>