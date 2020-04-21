
        @csrf
    
        <div class="form-group">
            <label for="title">Titulo</label>
            <input class="form-control" type="text" id="title" name="title" value={{old('title',$category->title)}}>
        </div>
    
    
        <div class="form-group">
            <label for="url_clean">url limpia</label>
            <input class="form-control" type="text" id="url_clean" name="url_clean" value={{old('url_clean',$category->url_clean)}}>
        </div>
       
    
        <input type="submit" value="Enviar" class="btn btn-primary">
  
