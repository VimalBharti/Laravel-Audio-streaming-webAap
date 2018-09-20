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
    <meta name="google-site-verification" content="YaDpQGJSl0pcVl7f2yniOo5Suv1b7pLUU6sMdYAW9lM" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')

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
