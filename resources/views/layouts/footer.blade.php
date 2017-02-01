@inject('contetnService', '\App\Services\ContentService')

<!--Bottom Four Column start-->
<section class="blue_section section_gap">
    <div class="container">
        <div class="row bottomfourcol"> 
            <!-- Footer About us start-->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bottomAbout">
                <h5 class="heading">حول {{trans('general.siteName')}}</h5>
                <p>{{trans('footer.aboutUs')}}</p>
                <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                <div class="addthis_inline_follow_toolbox pull-right">
                    <h5>نحن على الاجتماعي</h5>
                </div>
            </div>
            <!-- Footer About us end--> 
            <!-- Footer Recent news start-->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <h5 class="heading">أحدث الفيديوهات</h5>
                <ul class="footerLinks">
                    @foreach ($contetnService->getRecentContents(3) as $content)
                    <li>
                        <span>
                            {{$content->getLesson()->getSubject()->getName()}} - 
                            <a href="{{route('content.show', ['id' => $content->getId()])}}">
                                {{$content->getLesson()->getName()}}
                            </a>
                            <span>
                                {{$content->getAuthor()->getName()}}
                            </span>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- Footer Recent news end--> 
            <!-- Footer How it works start-->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <h5 class="heading">كيف يعمل؟</h5>
                <ul class="list">
                    @for ($i = 0; $i < 5; $i++)
                    <li>
                        <a href="{{route('general.howItWorks')}}#about-us-tab-{{$i}}">
                            {{trans("general.page.howItWorks.sections.$i.title")}}
                        </a>
                    </li>                    
                    @endfor
                </ul>
            </div>
            <!-- Footer How it works end--> 
            <!-- Footer we accept start-->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <h5 class="heading">روابط مهمة</h5>
                <ul>
                    <li><a href="{{route('register')}}">{{trans('footer.register')}}</a></li>
                    <li><a href="{{route('general.termsAndConditions')}}">{{trans('footer.termsAndConditions')}}</a></li>
                    <li><a href="{{route('general.contactUs')}}">{{trans('footer.contactUs')}}</a></li>
                </ul>
            </div>
            <!-- Footer we accept end--> 
        </div>
    </div>
</section>
<!--/Bottom Four Column end --> 

<!--Footer start-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="pull-left">
                <p>Copyright Nezaker.com &copy; {{date("Y")}}</p>
            </div>
            <div class="pull-right">
                <a class="gototop smooth" href="#wrapper">بداية الصفحة<i class="fa fa-chevron-up"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--Footer end --> 
