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
                                <p><a href="#courses" class="smooth">عرض الدروس <i class="fa fa-angle-right"></i></a></p>
                            </div>
                        </div>
                        <!--Header text1 end--> 
                        <img src="images/header-image/image01.jpg" alt="صورة"></div>
                    <div class="slide"> 
                        <!--Header text2 start-->
                        <div class="container hedaer-inner">
                            <div class="bannerText">
                                <h3>تطوير العملية التعليمية</h3>
                                <p>نذاكر يعمل على توصيل معلومة صحيحة وبطريقة لا يحتاج فيها الاباء الى مجهود ووقت كبير , وكذلك يعمل على اكتشاف مواهب الاطفال للاتصال المباشر بينهم وبين ابائهم لفتره من الوقت وكذلك متابعة مستوى الابناء الدراسى والعقلي   </p>
                                <p><a href="#courses" class="smooth">عرض الدروس <i class="fa fa-angle-right"></i></a></p>
                            </div>
                        </div>
                        <!--Header text2 end--> 
                        <img src="images/header-image/image02.jpg" alt="صورة"> </div>
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
<section class="white_section section_gap" id="how-it-works">
    @include ('general._how_it_works_content')
</section>
<!--/Available course end--> 

<!--popular courses start-->
<section class="grey_section section_gap" id="recent-lessons">
    @include ('general._recent_lessons')
</section>

<!--/popular courses end--> 

<!--fun facts start -->
<!--
<section class="yellow_section numbers_section factabout">
  <div class="container">
    <ul class="numbers countarea row">
      <li> <i class="fa fa-smile-o"></i>
        <h3 class="timer" data-from="100" data-to="24500" data-speed="10000"> </h3>
        <span>سعيد طالب</span> </li>
      <li> <i class="fa fa-smile-o"></i>
        <h3 class="timer" data-from="100" data-to="4500" data-speed="10000"> </h3>
        <span>مجموع الدورات</span> </li>
      <li> <i class="fa fa-smile-o"></i>
        <h3 class="timer" data-from="100" data-to="2200" data-speed="10000"> </h3>
        <span>دورات الفيديو</span> </li>
      <li> <i class="fa fa-smile-o"></i>
        <h3 class="timer" data-from="100" data-to="1450" data-speed="10000"> </h3>
        <span>مجموع المعلمين</span> </li>
      <li> <i class="fa fa-smile-o"></i>
        <h3 class="timer" data-from="100" data-to="550" data-speed="10000"> </h3>
        <span>شهادة</span> </li>
    </ul>
  </div>
</section>
-->
<!--fun facts end --> 

<!-- Teachers details start-->
<!--
<section class="grey_section section_gap" id="teachers">
    <div class="container">
        <div class="heading">
            <h1>المعلمون <span></span></h1>
            <p>Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat.<br>
                وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
        </div>
        <ul class="hover_listing row"> 
<li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
    <div class="img"><img src="images/teachers/teacher1.jpg" alt="معلم">
        <ul class="hover-social-icons">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-google"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
    </div>
    <h3 class="uppercase">ANA وزارة الطاقة</h3>
    <p>tincidunt adipiscing فريوس atgfnte في. سد موليس دهليز سابين </p>
</li>
<li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
    <div class="img"><img src="images/teachers/teacher2.jpg" alt="معلم">
        <ul class="hover-social-icons">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-google"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
    </div>
    <h3 class="uppercase">جوناثان وزارة الطاقة</h3>
    <p>tincidunt adipiscing فريوس atgfnte في. سد موليس دهليز سابين </p>
</li>
<li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
    <div class="img"><img src="images/teachers/teacher3.jpg" alt="معلم">
        <ul class="hover-social-icons">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-google"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
    </div>
    <h3 class="uppercase">ليزا براون</h3>
    <p>tincidunt adipiscing فريوس atgfnte في. سد موليس دهليز سابين </p>
</li>
<li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
    <div class="img"><img src="images/teachers/teacher4.jpg" alt="معلم">
        <ul class="hover-social-icons">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-google"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
    </div>
    <h3 class="uppercase">بيتر Mitchlle</h3>
    <p>tincidunt adipiscing فريوس atgfnte في. سد موليس دهليز سابين </p>
</li>
</ul>
</div>
</section>
-->

<!-- Teachers details end--> 

<!--Pricing Tables start-->
<!--

<section class="pricingtables section_gap" id="pricing">
<div class="container">
<div class="heading">
  <h1><span>من السهل</span> التسعير</h1>
  <p>Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat.<br>
    وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
</div>
<div class="row">
  <ul class="pricing-boxes three">
    <li>
      <div class="plan-name">
        <h2>بداية</h2>
        <h4>الخطة الشهرية</h4>
      </div>
      <div class="plan-price">
        <h4>10 دولارات أمريكية (أو ما يعادلها بالعملة المحلية)</h4>
      </div>
      <div class="plan-features">
        <ul>
          <li>غير محدود وصول الدورة</li>
          <li>20 فيديو وصول الدورة</li>
          <li>دراسة عبر الإنترنت</li>
          <li>لا Cretifications</li>
          <li>استشارات مجانية المعلم </li>
          <li>التلقائي الغيمة المساعدون</li>
        </ul>
        <a class="btn btn-primary" href="#">اقرأ المزيد</a> </div>
    </li>
    <li class="best-plan">
      <div class="plan-name color">
        <h2>*غير محدود</h2>
        <h4>الخطة الشهرية</h4>
      </div>
      <div class="plan-price color">
        <h4>8-11/2/2010</h4>
      </div>
      <div class="plan-features">
        <ul>
          <li>غير محدود وصول الدورة</li>
          <li>250 فيديو وصول الدورة</li>
          <li>دراسة عبر الإنترنت</li>
          <li>Cretifications</li>
          <li>استشارات مجانية المعلم </li>
          <li>التلقائي الغيمة المساعدون</li>
        </ul>
        <a class="btn btn-primary" href="#">اقرأ المزيد</a> </div>
    </li>
    <li>
      <div class="plan-name">
        <h2>بريميم</h2>
        <h4>الخطة الشهرية</h4>
      </div>
      <div class="plan-price last-child">
        <h4>8-11/2/2010</h4>
      </div>
      <div class="plan-features">
        <ul>
          <li>غير محدود وصول الدورة</li>
          <li>كامل الوصول دورة فيديو</li>
          <li>دراسة عبر الإنترنت</li>
          <li>Cretifications</li>
          <li>استشارات مجانية المعلم </li>
          <li>التلقائي الغيمة المساعدون</li>
        </ul>
        <a class="btn btn-primary" href="#">اقرأ المزيد</a> </div>
    </li>
  </ul>
</div>
</div>
</section>
-->

<!--Pricing Tables end --> 
<!--Happy Students star-->
<!--    
<section class="white_section section_gap" id="testimonial">
        <div class="container">
            <div class="heading">
                <h1>أباء سعداء<span></span></h1>
                <p>Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat.<br>
                    وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
            </div>
            <div class="imageSlide">
                <div class="imageBox"><img src="images/testimonials/thumb1.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
                <div class="imageBox"><img src="images/testimonials/thumb2.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
                <div class="imageBox"><img src="images/testimonials/thumb3.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
                <div class="imageBox"><img src="images/testimonials/thumb4.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
                <div class="imageBox"><img src="images/testimonials/thumb5.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
                <div class="imageBox"><img src="images/testimonials/thumb6.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
                <div class="imageBox"><img src="images/testimonials/thumb7.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
                <div class="imageBox"><img src="images/testimonials/thumb8.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
                <div class="imageBox"><img src="images/testimonials/thumb9.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
                <div class="imageBox"><img src="images/testimonials/thumb10.jpg" width="98" height="98" alt="{0}{/0} {1}طالب"></div>
            </div>
            <div class="footerTopContent">
                <div class="quote"><i class="fa fa-quote-left"></i></div>
                <ul class="slides testimonialText list-unstyled">
                    <li>
                        <p class="font-openBold">Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat. وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin. Nullam elementum تيلوس pretium feugiat</p>
                        <h3 class="uppercase">جيسي بينكمان، MDM شركة</h3>
                    </li>
                    <li>
                        <p class="font-openBold">Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat. وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.نونك pretium بتوقيت شرق الولايات المتحدة quis placerat congue. نام LECTUS وثيقة الهوية الوحيدة، pretium الحصول إيليت الهوية، ultricies interdum neque.</p>
                        <h3 class="uppercase">رينيه براون</h3>
                    </li>
                    <li>
                        <p class="font-openBold">Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat. وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
                        <h3 class="uppercase">جوناثان، Lexodia</h3>
                    </li>
                    <li>
                        <p class="font-openBold">Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat. وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
                        <h3 class="uppercase">Jinia الفلاني، ماركو وسائل الإعلام</h3>
                    </li>
                    <li>
                        <p class="font-openBold">وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin هوز. Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat. tincidunt في. سد tincidunt tristique ENIM ااا shasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat.</p>
                        <h3 class="uppercase">الدماغ رايس، كافة وسائل الإعلام</h3>
                    </li>
                    <li>
                        <p class="font-openBold">Vivamus finibus neque تيمبوس ENIM ماتيس pellentesque eget eget turpis. في URNA فيل الهرية ultricies scelerisque غير المصنفة في موضع غير المصنفة في موضع سابق. Phasellus غير دولور nibh. Nullam elementu السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
                        <h3 class="uppercase">جيني بارك، التسويق Oham</h3>
                    </li>
                    <li>
                        <p class="font-openBold">Donec معرف viverra بقطر. التحرير quis augue feugiat Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat. وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
                        <h3 class="uppercase">يوهان دو</h3>
                    </li>
                    <li>
                        <p class="font-openBold">Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat. وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
                        <h3 class="uppercase">داني Wahel، Crikinfo</h3>
                    </li>
                    <li>
                        <p class="font-openBold">Maecenas غير المصنفة في موضع metus حامل؛ حبلى، السيرة euismod احترازيا. nibh. Nullam elementum تيلوس pretium feugiat. وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
                        <h3 class="uppercase">اندى سيموند</h3>
                    </li>
                    <li>
                        <p class="font-openBold">أبجد هوز دولور الجلوس امات، consectetur adipiscing elitPhasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat. وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
                        <h3 class="uppercase">كريستي Gabbor، Martix وسائل الإعلام</h3>
                    </li>
                </ul>
            </div>
        </div>
    </section>-->
<!--/Happy Students end--> 
<!--Newsletter section star -->
<!--   
<section class="yellow_section section_gap" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <h3 class="signup_text">الاشتراك للحصول على آخر الأخبار والمستجدات</h3>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div id="mesaj"></div>
                    <form name="sform" id="subscribeform" method="post" action="http://themeelite.com/demos/e-learn/image+text-rotator/php/subscribe.php">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                                <input name="subemail" id="subemail" type="email" class="normal" placeholder="Email Address">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 button">
                                <input type="submit" id="subsubmit" name="send" class="button" value="تسجيل
                                       ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>-->
<!--/Newsletter section end--> 
<!--have Question start -->
<section class="grey_section section_gap" id="contact-us">
    @include ('general._contact_us_content')
</section>
<!--have Question end --> 
@endsection
