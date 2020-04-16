<form action="{{route("post.store")}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Titulo</label>
        <input class="form-control" type="text" id="title" name="title">
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