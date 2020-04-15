<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primera vista</title>
</head>

<body>
    <h1>Hola Mundo - {!! "hola Mundo $nombre $apellido"!!}</h1>
    <ul>
        @forelse ($posts2 as $post)
        <li> {{$post}} </li>
        @empty
        <li>Vacio</li>
        @endforelse
    </ul>
</body>

</html>