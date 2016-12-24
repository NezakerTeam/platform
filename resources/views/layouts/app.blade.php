<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="ar" dir="rtl"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="ar" dir="rtl"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="ar" dir="rtl"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="ar" dir="rtl"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="ar" dir="rtl">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Metas Page details-->
        <title>{{ config('app.name', 'Nezaker') }}</title>

        <meta name="description" content="UX designer and web developer" />
        <meta name="author" content="" />
        <!-- Mobile Specific Metas-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--main style-->
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/bootstrap.min.css'))}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/main.css'))}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/inner-style.css'))}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/skins/default.css'))}}" data-name="skins" />

        <!--google font style-->
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
        <!--font-family: 'Great Vibes', cursive; -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700' rel='stylesheet' type='text/css'>
        <!--font-family: 'Open Sans', sans-serif; -->

        <!-- font icon css style-->
        <link rel="stylesheet" href="{{asset(elixir('css/font-awesome.min.css'))}}" />
        <style>
            .menu {
                position: static;
                margin: 0;
            }
        </style>

        <!-- Scripts -->
        <script>
            window.Laravel = <?= json_encode(['csrfToken' => csrf_token()]); ?>
        </script>
    </head>
    <body class="inner-page" dir="rtl" >
        <!--wrapper start-->
        <div class="wrapper" id="wrapper"> 
            <!-- Preloader -->
            <div id="preloader">
                <div id="status"></div>
            </div>

            <!--Start Header-->
            @include('layouts.header')
            <!--End Header--> 

            @yield('content')

            <!--Footer start-->
            @include('layouts.footer')

            <!--Footer end --> 
        </div>
        <!--jquery min js--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script type="text/javascript" src="{{asset(elixir('js/bootstrap.min.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/jquery.easing.1.3.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/retina-1.1.0.min.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/inner-js/js/jquery.theme.revolution.min.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/jquery.jcarousel.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/jquery.isotope.min.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/swipe.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/main.js'))}}"></script> 

        <!--for theme custom jquery--> 
        <script type="text/javascript" src="{{asset(elixir('js/custom.js'))}}"></script>

        @yield('jsBodyEnd')

    </body>
</html>


