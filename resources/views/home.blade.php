@extends('layouts.app')

@section('main-content')

<section class="" id="register">
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
                                <p>أول موقع ألكترونى يهتم بشرح المناهج المدرسية للأباء فى فيديو قصيرة المدة يتراوح بين (5- 10 دقائق ) لكل درس يعمل على شرح الفكرة الاساسية للدرس مع طريقة شرحها ومثال عليها مما يعد استفاده كبرى لرفع مستوى الاباء فى توصيل المعلومة بشكل صحيح لابنائهم ولتوفير وقت كبير جدا .</p>
                                <p><a href="#recent-lessons" class="smooth">عرض الدروس <i class="fa fa-angle-right"></i></a></p>
                            </div>
                        </div>
                        <!--Header text1 end--> 
                        <img src="images/header-image/3.jpg" alt="صورة"></div>
                    <div class="slide"> 
                        <!--Header text2 start-->
                        <div class="container hedaer-inner">
                            <div class="bannerText">
                                <h3>تطوير العملية التعليمية</h3>
                                <p>نذاكر يعمل على توصيل معلومة صحيحة وبطريقة لا يحتاج فيها الاباء الى مجهود ووقت كبير , وكذلك يعمل على اكتشاف مواهب الاطفال للاتصال المباشر بينهم وبين ابائهم لفتره من الوقت وكذلك متابعة مستوى الابناء الدراسى والعقلي   </p>
                                <p><a href="#recent-lessons" class="smooth">عرض الدروس <i class="fa fa-angle-right"></i></a></p>
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
                <h2>أبدأ بتسجيل دروسك<span>قم بالتسجيل الان لأضافة الدروس الخاصة بك</span></h2>
                {!! form_start($registerForm) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                        {!! form_errors($registerForm->first_name)!!}
                        {!! form_widget($registerForm->first_name)!!}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
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
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                        {!! form_errors($registerForm->phone_numbers)!!}
                        {!! form_widget($registerForm->phone_numbers)!!}
                    </div>          

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {!! form_widget($registerForm->submit, ['attr'=> ['class' => 'input-button', 'width' => '40%']])!!}
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
