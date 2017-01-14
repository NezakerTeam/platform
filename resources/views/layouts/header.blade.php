<!--Start Header-->
<header> 

    <!--menu start-->
    <div class="menu">
        <div class="navbar-wrapper stuckMenu isStuck">
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
                                        <li class="menuItem">
                                            @if (Auth::guest())
                                            @php $aboutUsUrl = route('app.home').'#about-us';@endphp
                                            @else
                                            @php $aboutUsUrl = route('general.aboutUs');@endphp
                                            @endif
                                            <a href="{{$aboutUsUrl}}">عن نذاكر</a>
                                        </li>
                                        <li class="menuItem">
                                            @if (Auth::guest())
                                            @php $howItWorksUrl = route('app.home').'#how-it-works';@endphp
                                            @else
                                            @php $howItWorksUrl = route('general.howItWorks');@endphp
                                            @endif
                                            <a href="{{$howItWorksUrl}}">كيف يعمل</a>
                                        </li>
                                        <li class="menuItem">
                                            @if (Auth::guest())
                                            @php $allLessonsUrl = route('app.home').'#recent-lessons';@endphp
                                            @else
                                            @php $allLessonsUrl = route('lesson.all');@endphp
                                            @endif
                                            <a href="{{$allLessonsUrl}}">كل الدروس</a>
                                        </li>
                                        @if (Auth::check())
                                        <li><a href="{{ route('content.create') }}">{{ trans('content.createNew') }}</a></li>
                                        @endif
                                        <li class="menuItem">
                                            @if (Auth::guest())
                                            @php $contactUsUrl = route('app.home').'#contact-us';@endphp
                                            @else
                                            @php $contactUsUrl = route('general.contactUs');@endphp
                                            @endif
                                            <a href="{{$contactUsUrl}}">جهة اتصال</a>
                                        </li>

                                        <!-- Authentication Links -->
                                        @if (Auth::guest())
                                        <li><a href="{{ url('/login') }}">{{ trans('auth.login') }}</a></li>
                                        <li><a href="{{ url('/register') }}">{{ trans('auth.register') }}</a></li>
                                        @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Auth::user()->getName() }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                <!--<li><a href="{{ route('teacher.myCourses') }}">My courses</a></li>-->
                                                <li><a href="{{ route('user.profile.edit') }}">{{trans('auth.editProfile')}}</a></li>
                                                <li>
                                                    <a href="{{ url('/logout') }}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                        {{trans('auth.logout')}}
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
