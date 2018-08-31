<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Bybu - Freebies PSD + Templates + Designs and other Free Stuff</title> -->
    <title>@yield('title') - Bybu Freebies | PSD + Templates + Designs and other Free Stuff</title>
    <meta name="description" content="Download Free and Exclusive PSD Files with HTML and CSS Code. Free Showcase your design -  free for lifetime. A collection of free high quality website templates designed with Photoshop. Bybu.cc - freebies ">
    <meta name="robots" content="index, follow" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123989535-1"></script>
    <script type="text/javascript">
    <!-- Global site tag (gtag.js) - Google Analytics -->
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-123989535-1');
    </script>

</head>
<body>

    <div id="app">
      @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/master.js') }}"></script>
    @yield('scripts')

</body>
</html>
