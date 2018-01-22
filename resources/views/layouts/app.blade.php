<!DOCTYPE html>
<html class="no-js" lang="ar" dir="rtl">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Mobile Specific Metas-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        {!! SEO::generate() !!}

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
        <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
        <!--font-family: 'Great Vibes', cursive; -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700' rel='stylesheet' type='text/css'>
        <!--font-family: 'Open Sans', sans-serif; -->

        <!-- font icon css style-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
              rel="stylesheet" 
              integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Scripts -->
        <script>
            window.Laravel = <?= json_encode(['csrfToken' => csrf_token()]); ?>
        </script>     

        @include('includes.google_analytics')

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

            $(document).ready(function () {
                var itemsMainDiv = ('.MultiCarousel');
                var itemsDiv = ('.MultiCarousel-inner');
                var itemWidth = "";

                $('.leftLst, .rightLst').click(function () {
                    var condition = $(this).hasClass("leftLst");
                    if (condition)
                        click(0, this);
                    else
                        click(1, this)
                });

                ResCarouselSize();




                $(window).resize(function () {
                    ResCarouselSize();
                });

                //this function define the size of the items
                function ResCarouselSize() {
                    var incno = 0;
                    var dataItems = ("data-items");
                    var itemClass = ('.item');
                    var id = 0;
                    var btnParentSb = '';
                    var itemsSplit = '';
                    var sampwidth = $(itemsMainDiv).width();
                    var bodyWidth = $('body').width();
                    $(itemsDiv).each(function () {
                        id = id + 1;
                        var itemNumbers = $(this).find(itemClass).length;
                        btnParentSb = $(this).parent().attr(dataItems);
                        itemsSplit = btnParentSb.split(',');
                        $(this).parent().attr("id", "MultiCarousel" + id);


                        if (bodyWidth >= 1200) {
                            incno = itemsSplit[3];
                            itemWidth = sampwidth / incno;
                        } else if (bodyWidth >= 992) {
                            incno = itemsSplit[2];
                            itemWidth = sampwidth / incno;
                        } else if (bodyWidth >= 768) {
                            incno = itemsSplit[1];
                            itemWidth = sampwidth / incno;
                        } else {
                            incno = itemsSplit[0];
                            itemWidth = sampwidth / incno;
                        }
                        $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                        $(this).find(itemClass).each(function () {
                            $(this).outerWidth(itemWidth);
                        });

                        $(".leftLst").addClass("over");
                        $(".rightLst").removeClass("over");

                    });
                }


                //this function used to move the items
                function ResCarousel(e, el, s) {
                    var leftBtn = ('.leftLst');
                    var rightBtn = ('.rightLst');
                    var translateXval = '';
                    var divStyle = $(el + ' ' + itemsDiv).css('transform');
                    var values = divStyle.match(/-?[\d\.]+/g);
                    var xds = Math.abs(values[4]);
                    if (e == 0) {
                        translateXval = parseInt(xds) - parseInt(itemWidth * s);
                        $(el + ' ' + rightBtn).removeClass("over");

                        if (translateXval <= itemWidth / 2) {
                            translateXval = 0;
                            $(el + ' ' + leftBtn).addClass("over");
                        }
                    } else if (e == 1) {
                        var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                        translateXval = parseInt(xds) + parseInt(itemWidth * s);
                        $(el + ' ' + leftBtn).removeClass("over");

                        if (translateXval >= itemsCondition - itemWidth / 2) {
                            translateXval = itemsCondition;
                            $(el + ' ' + rightBtn).addClass("over");
                        }
                    }
                    $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
                }

                //It is used to get some elements from btn
                function click(ell, ee) {
                    var Parent = "#" + $(ee).parent().attr("id");
                    var slide = $(Parent).attr("data-slide");
                    ResCarousel(ell, Parent, slide);
                }

            });

        </script>
        @yield('jsBodyEnd')
        <style>
            .MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
            .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
            .MultiCarousel .MultiCarousel-inner .item { float: left;}
            .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:10px; background:#f1f1f1; color:#666;}
            .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
            .MultiCarousel .leftLst { left:0; }
            .MultiCarousel .rightLst { right:0; }

            .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }
        </style>
    </body>
</html>


