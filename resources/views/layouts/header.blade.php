<!--Start Header-->
<header> 

    <!--menu start-->
    <div class="menu">
        <div class="navbar-wrapper">
            <div class="container"> 
                <!--Logo -->
                <div class="logo">
                    <a href="{{route('app.home')}}">
                        <img src="{{asset(elixir('images/nezaker-logo.png'))}}" alt="">
                    </a> 
                </div>
                <!--Logo -->
                <div class="navwrapper">
                    <div class="navbar navbar-inverse navbar-static-top">
                        <div class="container">
                            <nav class="navArea">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav" id="navigation">
                                        <li class="menuItem" id="home"><a href="{{route('app.home')}}">الصفحة الرئيسية</a></li>
                                        <li class="menuItem"><a href="{{route('general.howItWorks')}}">كيف يعمل</a></li>
                                        <li class="menuItem"><a href="{{route('general.aboutUs')}}">عن نذاكر</a></li>
                                        <li class="menuItem"><a href="{{route('lesson.all')}}">كل الدروس</a></li>
                                        <!--
                                        <li class="menuItem"><a href="#teachers">المعلمون</a></li>
                                        <li class="menuItem"><a href="#testimonial">الأباء</a></li>
                                        <li><a href="blog-medium-image.html">مُدونات</a></li>
                                        -->
                                        <li class="menuItem"><a href="#contact">جهة اتصال</a></li>

                                        <!-- Authentication Links -->
                                        @if (Auth::guest())
                                        <li><a href="{{ url('/login') }}">Login</a></li>
                                        <li><a href="{{ url('/register') }}">Register</a></li>
                                        @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Auth::user()->getName() }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('teacher.myCourses') }}">My courses</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.profile.edit') }}">Edit profile</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/logout') }}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        @endif
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
