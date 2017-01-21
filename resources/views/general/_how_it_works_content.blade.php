<div class="container">
    <div class="heading">
        <h1><span>{{trans('general.page.howItWorks.title')}}</span></h1>
        <p>{{trans('general.page.howItWorks.desc')}}</p>
    </div>
    <div class="row"> 
        <!-- Vertical tabs start-->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <ul class="nav nav-tabs custom-nav-tabs url-tabs" role="tablist">
                <li class="active" role="presentation">
                    <a href="#about-us-tab-0" aria-controls="about-us-tab-0" role="tab" data-toggle="tab">{{trans('general.page.howItWorks.sections.0.title')}}</a>
                </li>
                <li role="presentation">
                    <a href="#about-us-tab-1" aria-controls="about-us-tab-1" role="tab" data-toggle="tab">{{trans('general.page.howItWorks.sections.1.title')}}</a>
                </li>
                <li role="presentation">
                    <a href="#about-us-tab-2" aria-controls="about-us-tab-2" role="tab" data-toggle="tab">{{trans('general.page.howItWorks.sections.2.title')}}</a>
                </li>
                <li role="presentation">
                    <a href="#about-us-tab-3" aria-controls="about-us-tab-3" role="tab" data-toggle="tab">{{trans('general.page.howItWorks.sections.3.title')}}</a>
                </li>
                <li role="presentation">
                    <a href="#about-us-tab-4" aria-controls="about-us-tab-4" role="tab" data-toggle="tab">{{trans('general.page.howItWorks.sections.4.title')}}</a>
                </li>
            </ul>
        </div>
        <!-- Vertical tabs end--> 
        <!-- Vertical tabs content start-->
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 tab_text">
            <div class="tab-content"> 
                <!-- Vertical tabs content01 start-->  
                <div class="tab-pane active" id="about-us-tab-0" role="tabpanel">

                    <div class="row"> 
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                            <img src="{{asset(elixir('images/general/about_us/register_now.png'))}}" alt="">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">                   
                            <h3>{{trans('general.page.howItWorks.sections.0.title')}}</h3>
                            <p>{!!trans('general.page.howItWorks.sections.0.desc')!!}</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="about-us-tab-1" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                            <img src="{{asset(elixir('images/general/about_us/internet-marketing.jpg'))}}" alt="">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                            <h3>{{trans('general.page.howItWorks.sections.1.title')}}</h3>
                            <p>{!!trans('general.page.howItWorks.sections.1.desc')!!}</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="about-us-tab-2" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                            <img src="{{asset(elixir('images/general/about_us/send_video.png'))}}" alt="">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                            <h3>{{trans('general.page.howItWorks.sections.2.title')}}</h3>
                            <p>{!!trans('general.page.howItWorks.sections.2.desc')!!}</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="about-us-tab-3" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                            <img src="{{asset(elixir('images/general/about_us/branding.jpg'))}}" alt="">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                            <h3>{{trans('general.page.howItWorks.sections.3.title')}}</h3>
                            <p>{!!trans('general.page.howItWorks.sections.3.desc')!!}</p>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="about-us-tab-4" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                            <img src="{{asset(elixir('images/general/about_us/parent_browse.png'))}}" alt="">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                            <h3>{{trans('general.page.howItWorks.sections.4.title')}}</h3>
                            <p>{!!trans('general.page.howItWorks.sections.4.desc')!!}</p>
                        </div>
                    </div>
                </div>
                <!-- Vertical tabs content04 end--> 
            </div>
        </div>
        <!-- Vertical tabs content end--> 
    </div>
</div>
