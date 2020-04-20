<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
   <script src="{{ asset("js/app.js") }}"></script>
    <title> Modulo </title>
</head>
<body>


  @include('dashboard.post.parciales.nav-header-main')

  <div class="container">
    @include('dashboard.post.parciales.session-flash-status')
    @yield('content')
    </div>
</body>
</html>