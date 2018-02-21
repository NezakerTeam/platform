@extends('layouts.app')

@section('main-content')

<section class="" id="register" style="margin-bottom: 40px;">
    <div class="">
        <!--banner start -->
        <div class="header_v1">
            <div class="banner row" id="banner">
                <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 noPadd slides-container" style="height:100%"> 
                    <!--background slide show start-->
                    <div class="slide"> 
                        <!--Header text1 start-->
                        <div class="container hedaer-inner">
                            <div class="bannerText">
                                <h3>نذاكر</h3>
                                <p>أول منصة متكاملة هدفها مساعدة أولياء الأمور في تطوير أداء أولادهم في المجالات المختلفة " الدراسية، الصحية، الاجتماعية، الاخلاقية، الرياضية، النفسية، الثقافية" عن طريق فيديوهات جذابة موجهة لولي الأمر، تتراوح هذه الفيديوهات مابين 3 إلى 10 دقائق </p>
                                <p><a href="#recent-lessons" class="smooth">عرض الفيديوهات <i class="fa fa-angle-right"></i></a></p>
                            </div>
                        </div>
                        <!--Header text1 end--> 
                        <img src="images/header-image/3.jpg" alt="صورة"></div>
                    <div class="slide"> 
                        <!--Header text2 start-->
                        <div class="container hedaer-inner">
                            <div class="bannerText">
                                <h3>تطوير أداء الابناء</h3>
                                <p>نذاكر يعمل على تقديم استشارات قيمة للأباء والامهات و تساعدهم على ممارسة أنشطة مفيدة مع أبنائهم وإدراك احتياجاتهم خلال كل مرحلة المختلفة </p>
                                <p><a href="#recent-lessons" class="smooth">عرض الفيديوهات <i class="fa fa-angle-right"></i></a></p>
                            </div>
                        </div>
                        <!--Header text2 end--> 
                        <img src="images/header-image/8.jpg" alt="صورة"> </div>
                    <!--background slide show end--> 
                </div>
            </div>
        </div>
        <!--banner end --> 

        <!--Header form -->
        <div class="container form-header">
            <div class="form-container">
                <h2>أبدأ بتسجيل فيديوهات<span>قم بالتسجيل الان لأضافة الفيديوهات الخاصة بك</span></h2>
                {!! form_start($registerForm) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                        {!! form_errors($registerForm->type)!!}
                        {!! form_widget($registerForm->type)!!}
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form-row">
                        {!! form_errors($registerForm->first_name)!!}
                        {!! form_widget($registerForm->first_name)!!}
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form-row">
                        {!! form_errors($registerForm->last_name)!!}
                        {!! form_widget($registerForm->last_name)!!}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                        {!! form_errors($registerForm->email)!!}
                        {!! form_widget($registerForm->email)!!}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                        {!! form_errors($registerForm->password)!!}
                        {!! form_widget($registerForm->password)!!}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                        {!! form_errors($registerForm->city_id)!!}
                        {!! form_widget($registerForm->city_id)!!}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {!! form_errors($registerForm->phone_numbers)!!}
                        {!! form_widget($registerForm->phone_numbers)!!}
                    </div>          

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                        {!! form_widget($registerForm->submit, ['attr'=> ['class' => 'input-button', 'width' => '40%']])!!}
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <a href="{{ url(route('socialAuth.facebook')) }}" class="btn btn-social btn-lg btn-facebook"><i class="fa fa-facebook"></i> ادخل بالفيسبوك</a>
                    </div>
                </div>
                {!! form_end($registerForm) !!}
            </div>
        </div>

    </div>
</section>
<!--/Header form --> 

<section class="white_section section_gap" id="about-us">
    @include ('general._about_us_content')
</section>

<!--Available course start-->
<section class="grey_section section_gap" id="how-it-works">
    @include ('general._how_it_works_content')
</section>
<!--/Available course end--> 

<!--popular courses start-->
<section class="white_section section_gap" id="recent-lessons">
    @include ('general._recent_lessons')
</section>
<!--/popular courses end--> 

<!--have Question start -->
<section class="grey_section section_gap" id="contact-us">
    @include ('general._contact_us_content')
</section>
<!--have Question end --> 
@endsection
