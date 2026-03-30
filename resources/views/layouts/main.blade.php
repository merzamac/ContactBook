<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD Contacts - @yield('title', 'ContactBook')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  </head>
  <body>
    <main class="container">
      @yield('header')
      @yield('content')
    </main>
    @include("modules.modal")
    @stack('scripts')
  </body>
</html>