
@extends('dashboard.category.master')

@section('content')

        <div class="form-group">
            <label for="title">Titulo</label>
            <input readonly class="form-control" type="text" id="title" name="title" value={{$category->title}}>
           
        </div>
    
    
        <div class="form-group">
            <label for="url_clean">url limpia</label>
            <input  readonly class="form-control" type="text" id="url_clean" name="url_clean" value={{$category->url_clean}}>
        </div>
       
    

    
@endsection