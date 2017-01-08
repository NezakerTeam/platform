<!DOCTYPE html>
<html class="no-js" lang="ar" dir="rtl">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Metas Page details-->
        <title>{{ config('app.name', 'Nezaker') }}</title>

        <meta name="description" content="{{ config('app.description', 'Nezaker') }}" />
        <meta name="author" content="" />
        <!-- Mobile Specific Metas-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--main style-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/main.css'))}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/inner-style.css'))}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/skins/default.css'))}}" data-name="skins" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/custom.css'))}}" />

        <!--google font style-->
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
        <!--font-family: 'Great Vibes', cursive; -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700' rel='stylesheet' type='text/css'>
        <!--font-family: 'Open Sans', sans-serif; -->

        <!-- font icon css style-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
              rel="stylesheet" 
              integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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

            @if (Session::has('flash_message'))
            <div class="alert alert-success flash-message">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <b>{{ Session::get('flash_message') }}</b></div>
            @endif

            @yield('content')

            <!--Footer start-->
            @include('layouts.footer')

            <!--Footer end --> 
        </div>
        <!--jquery min js--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="{{asset(elixir('js/jquery.easing.1.3.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/retina-1.1.0.min.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/inner-js/js/jquery.theme.revolution.min.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/jquery.jcarousel.js'))}}"></script> 
        <!-- <script type="text/javascript" src="{{asset(elixir('js/jquery.isotope.min.js'))}}"></script> -->
        <script type="text/javascript" src="{{asset(elixir('js/swipe.js'))}}"></script> 
        <script type="text/javascript" src="{{asset(elixir('js/main.js'))}}"></script> 

        <!--for theme custom jquery--> 
        <script type="text/javascript" src="{{asset(elixir('js/custom.js'))}}"></script>

        <script type="text/javascript" src="{{asset(elixir('js/jquery.superslides.js'))}}" type="text/javascript"></script>
        <script type="text/javascript">
            "use strict";
            $('.header_v1 #banner').superslides({
                animation: 'fade',
                play: 5000
            });
        </script> 

        @yield('jsBodyEnd')

    </body>
</html>


