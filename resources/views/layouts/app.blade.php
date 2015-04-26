<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title', '<title>CW Legal</title>')

    <!-- Bootstrap -->
    <link href="{{ elixir("css/app.css") }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{ asset('js/ie.js') }}"></script>
    <![endif]-->
  </head>
  @yield('body', '<body class=" ">')

    <!-- Page -->
    <div id="page" class="container">
        @yield('content')
    </div>

    <!-- Scripts -->
    <div id="scripts">
        <!-- Jquery and Bootstrap -->
        <script src="{{ asset('js/framework.js') }}"></script>
        <!-- Page specific scripts (if any) -->
        @yield('scripts')
    </div>

  </body>
</html>