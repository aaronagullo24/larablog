@csrf

<div class="form-group">
    <label for="title">Titulo</label>
    <input class="form-control" type="text" id="title" name="title" value={{old('title',$post->title)}}>
    @error('title')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>


<div class="form-group">
    <label for="url_clean">url limpia</label>
    <input class="form-control" type="text" id="url_clean" name="url_clean" value={{old('url_clean',$post->url_clean)}}>
</div>


<div class="form-group">
    <label for="categorias">Categorias</label>

    <select name="category_id" class="form-control" id="category_id">
        @foreach($categories as $title=>$id)
            <option value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>

</div>

<div class="form-group">
    <label for="content">Contenido</label>
    <textarea class="form-control" id="content" name="content" row="3">{{old('content',$post->content)}}</textarea>
</div>

<input type="submit" value="Enviar" class="btn btn-primary">