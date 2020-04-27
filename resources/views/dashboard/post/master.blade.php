<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset("css/app.css")}}">

  <title> Modulo </title>
</head>

<body>
  
  <div class="container mb-3 mt-3" id="app">
    @include('web.partials.nav-header-main')
    @yield('content')
    @include('web.partials.footer-main')
  </div>
  <script src="{{asset('js/app.js')}}"></script>

</body>

</html>