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
        <link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
        <link rel="stylesheet" type="text/css" href="/css/inner-style.css" media="screen">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/skins/default.css" data-name="skins" />

        <!--google font style-->
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
        <!--font-family: 'Great Vibes', cursive; -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700' rel='stylesheet' type='text/css'>
        <!--font-family: 'Open Sans', sans-serif; -->

        <!-- font icon css style-->
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
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
            <header> 
                <!--menu start-->
                <div class="menu">
                    <div class="navbar-wrapper">
                        <div class="container"> 
                            <!--Logo -->
                            <div class="logo"><a href="#"><img src="/images/nezaker-logo.png" alt=""></a> </div>
                            <!--Logo -->
                            <div class="navwrapper">
                                <div class="navbar navbar-inverse navbar-static-top">
                                    <div class="container">
                                        <nav class="navArea">
                                            <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                            </div>
                                            <div class="navbar-collapse collapse">
                                                <ul class="nav navbar-nav" id="navigation">
                                                    <li class="menuItem" id="home"><a href="#wrapper">الصفحة الرئيسية</a></li>
                                                    <li class="menuItem"><a href="#features">كيف يعمل</a></li>
                                                    <li class="menuItem"><a href="#aboutus">عن نذاكر</a></li>
                                                    <li class="menuItem"><a href="#courses">أحدث الدروس</a></li>
                                                    <!--
                                                    <li class="menuItem"><a href="#teachers">المعلمون</a></li>
                                                    <li class="menuItem"><a href="#testimonial">الأباء</a></li>
                                                    <li><a href="blog-medium-image.html">مُدونات</a></li>
                                                    -->
                                                    <li class="menuItem"><a href="#contact">جهة اتصال</a></li>
                                                </ul>
                                            </div>
                                        </nav>

                                    </div>
                                </div>
                            </div>
                            <!-- End Navbar --> 
                        </div>
                    </div>
                </div>
                <!--menu end--> 

            </header>
            <!--End Header--> 

            @yield('content')

            <!--Footer start-->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="pull-left">
                            <p>&copy; 2015  eLearn Theme. All Rights Reserved</p>
                        </div>
                        <div class="pull-right"><a class="gototop smooth" href="#wrapper">Go To Top<i class="fa fa-chevron-up"></i></a></div>
                    </div>
                </div>
            </footer>
            <!--Footer end --> 
        </div>
        <!--jquary min js--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script src="/js/bootstrap.min.js"></script> 
        <script src="/js/jquery.easing.1.3.js"></script> 
        <script src="/js/retina-1.1.0.min.js"></script> 
        <script src="/js/inner-js/js/jquery.theme.revolution.min.js"></script> 
        <script type="text/javascript" src="/js/jquery.jcarousel.js"></script> 
        <script type="text/javascript" src="/js/jquery.isotope.min.js"></script> 
        <script type="text/javascript" src="/js/swipe.js"></script> 
        <script src="/js/main.js"></script> 

        <!--for theme custom jquery--> 
        <script src="/js/custom.js"></script>

    </body>
</html>


