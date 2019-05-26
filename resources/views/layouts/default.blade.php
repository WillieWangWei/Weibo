<!DOCTYPE html>
<html>

  <head>
    <title>@yield('title', 'Weibo App') - Laravel</title>
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
  </body>

</html>
