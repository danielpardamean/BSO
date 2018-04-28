<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <title>{{ config('app.name') }}</title>
      <script src="{{ asset('js/app.js') }}"></script>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/select2-bootstrap.min.css') }}">
      <script src="{{ asset('js/select2.min.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
      <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
      <script>
        $.fn.select2.defaults.set( "theme", "bootstrap" );
      </script>
   </head>
   <body>
        @yield('content')
   </body>
</html>