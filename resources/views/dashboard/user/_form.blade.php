
        @csrf
    
        <div class="form-group">
            <label for="name">Nombre</label>
            <input class="form-control" type="text" id="name" name="name" value={{old('name',$user->name)}}>
        </div>
    
    
        <div class="form-group">
            <label for="surname">surname</label>
            <input class="form-control" type="text" id="surname" name="surname" value={{old('surname',$user->surname)}}>
        </div>

        <div class="form-group">
            <label for="emil">Email</label>
            <input class="form-control" type="email" id="email" name="email" value={{old('email',$user->email)}}>
        </div>

        @if($pasw)
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password" value={{old('password',$user->password)}}>
        </div>
        @endif
       
    
        <input type="submit" value="Enviar" class="btn btn-primary">
  
