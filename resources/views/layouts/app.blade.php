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
        <link rel="shortcut icon" type="image/png" href="{{asset(elixir('images/favicon.png'))}}"/>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.2.0-rc2/css/bootstrap-rtl.min.css">

        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/main.css'))}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/inner-style.css'))}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/skins/default.css'))}}" data-name="skins" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/custom.css'))}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset(elixir('css/vertical-tabs.css'))}}" />

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

            @section('main-content')
            <div class='inner-page-container'>
                @yield('content')
            </div>
            @show

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

        <!--for video lightbox -->
        <link rel="stylesheet" href="{{asset(elixir('css/prettyPhoto.css'))}}" 
              type="text/css" title="prettyPhoto main stylesheet" property="stylesheet" media="screen"></link>
        <script src="{{asset(elixir('js/jquery.prettyPhoto.js'))}}" type="text/javascript"></script>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58868a0e4a040acb"></script> 

        <script type="text/javascript">
            var addthis_config = addthis_config || {};
            addthis_config.lang = 'ar' //show in Spanish regardless of browser settings;
        </script>

        <script type="text/javascript">
            "use strict";
            $('.header_v1 #banner').superslides({
                animation: 'fade',
                play: 5000
            });
            jQuery(function ($) {
                $(document).ready(function () {
                    // Video lightbox
                    $("a[data-rel^='prettyPhoto']").prettyPhoto();
                });
            });
        </script> 

        <script type="text/javascript">
            $(function () {
                var hash = window.location.hash;
                hash && $('ul.url-tabs a[href="' + hash + '"]').tab('show');

                $('.url-tabs a').click(function (e) {
                    $(this).tab('show');
                    var scrollmem = $('body').scrollTop() || $('html').scrollTop();
                    window.location.hash = this.hash;
                    $('html,body').scrollTop(scrollmem);
                });
            });
        </script>
        @yield('jsBodyEnd')

    </body>
</html>


