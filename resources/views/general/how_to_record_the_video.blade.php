@extends('layouts.app')

@section('content')

<div class="container">
    <div class="heading">
        <h1><span>{{trans('general.page.howToRecordTheVideo.title')}}</span></h1>
        <p>
            {{trans('general.page.howToRecordTheVideo.desc')}}
            <br />
            <a href="#computer-recording">
                الطريقة الأولى :- استخدام جهاز الكمبيوتر
            </a>
            -
            <a href="#cam-recording">
                الطريقة الثانية:- استخدام الكاميرا
            </a>
        </p>
    </div>
    <div class="col-md-11 col-md-offset-1"> 
        <div class="row"> 
            <div class="panel panel-default" id="computer-recording">
                <div class="panel-heading">
                    <h3 class="panel-title">الطريقة الأولى :- باستخدام جهاز الكمبيوتر   </h3>
                </div>
                <div class="panel-body">
                    في هذه الطريقة قد تحتاج إلى برنامج الباوربوينت يمكنك تنزيل احد قوالب البوربوينت الخاصة بنذاكر من بالضغط على الشعار التالي

                    <div class="text-center">
                        <img src="{{asset(elixir('images/general/how_to_record_the_video/powerpoint.png'))}}" alt="">
                        <br />
                        <a href="https://www.dropbox.com/s/rq0j2rewqrutcox/%D9%86%D8%B0%D8%A7%D9%83%D8%B1%20PowerPoint%20PresentationTemplate.pptx?dl=0" target="_blank">
                            قالب باوربوينت لشرح الدرس
                        </a>
                    </div>
                    <br />

                    يمكن استخدام البرنامج التالي (screencast-o-mati) لتسجيل الفيديوهات الخاصة بك من على جهاز الكمبيوتر سيتم تحميل البرنامج عند الضغط على الشعار التالي

                    <div class="text-center">
                        <img src="{{asset(elixir('images/general/how_to_record_the_video/screencast.jpg'))}}" alt="">
                        <br />
                        <a href="https://screencast-o-matic.com/download" target="_blank">
                            تحميل البرنامج
                        </a>
                    </div>
                    <br />
                    ويمكنك الاطلاع على طريقة استخدام البرنامج و تحميله عن طريق الرابط التالي
                    <a href="https://youtu.be/Gm-x0RHpr8g" target="_blank">
                        طريقة الاستخدام
                    </a>
                </div>
            </div>
            <div class="panel panel-default" id="cam-recording">
                <div class="panel-heading">
                    <h3 class="panel-title">الطريقة الثانية:- باستخدام الكاميرا</h3>
                </div>
                <div class="panel-body">
                    يمكنك في هذه الطريقة استخدام كاميرا الموبايل بمساعدة شخص آخر ليقوم بتصويرها أو تثبيت الكاميرا والتسجيل دون الحاجة لمساعدة شخص آخر في الفيديو التالي نقوم بشرح طريقة قد تساعدك على تسجيل الفيديو الخاص بك بكاميرا الموبايل باستخدام أدوات بسيطة وبدون مساعدة من شخص آخر
                    <div class="text-center">
                        <img src="{{asset(elixir('images/general/how_to_record_the_video/Selfie-96.png'))}}" alt="">
                        <br />
                        <a href="https://youtu.be/1gYiC8qCCKY" target="_blank">
                            فيديو تسجيل فيديو باستخدام كاميرا الموبايل
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
