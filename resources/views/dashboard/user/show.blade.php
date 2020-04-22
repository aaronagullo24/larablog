
@extends('dashboard.category.master')

@section('content')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input readonly class="form-control" type="text" id="name" name="name" value={{$user->name}}>
           
        </div>
    
    
        <div class="form-group">
            <label for="surname">surname</label>
            <input  readonly class="form-control" type="text" id="surname" name="surname" value={{$user->surname}}>
        </div>
       
    

    
@endsection