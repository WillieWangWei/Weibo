<!DOCTYPE html>
<html>

  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Weibo App') - Weibo App</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>

  <body>
    @include('layouts._header')
    <div class="container">
      <div class="col-md-10 offset-md-1">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>

</html>
