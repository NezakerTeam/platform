<div class="container">
    <div class="heading">
        <h1><span>{{trans('general.page.howItWorks.title')}}</span></h1>
        <p>{{trans('general.page.howItWorks.desc')}}</p>
    </div>
    <div class="row"> 
        <!-- Vertical tabs start-->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <ul class="nav nav-tabs custom-nav-tabs" role="tablist">
                <li class="active" role="presentation">
                    <a href="#graphicesigning" aria-controls="graphicesigning" role="tab" data-toggle="tab">{{trans('general.page.howItWorks.sections.0.title')}}</a>
                </li>
                <li role="presentation">
                    <a href="#onlinemarketing" aria-controls="onlinemarketing" role="tab" data-toggle="tab">{{trans('general.page.howItWorks.sections.1.title')}}</a>
                </li>
                <li role="presentation">
                    <a href="#brandstrategy" aria-controls="brandstrategy" role="tab" data-toggle="tab">{{trans('general.page.howItWorks.sections.2.title')}}</a>
                </li>
                <li role="presentation">
                    <a href="#generalmedicine" aria-controls="generalmedicine" role="tab" data-toggle="tab">{{trans('general.page.howItWorks.sections.3.title')}}</a>
                </li>
            </ul>
        </div>
        <!-- Vertical tabs end--> 
        <!-- Vertical tabs content start-->
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 tab_text">
            <div class="tab-content"> 
                <!-- Vertical tabs content01 start-->  

                <div class="tab-pane active" id="graphicesigning" role="tabpanel">

                    <div class="row"> 
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5"><img src="images/graphic-design.jpg" alt=""></div>
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">                   
                            <h3>{{trans('general.page.howItWorks.sections.0.title')}}</h3>
                            <p>{!!trans('general.page.howItWorks.sections.0.desc')!!}</p>
                        </div>
                    </div>
                </div>
                <!-- Vertical tabs content01 end--> 
                <!-- Vertical tabs content02 start-->

                <div class="tab-pane fade" id="onlinemarketing" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5"><img src="images/internet-marketing.jpg" alt=""></div>
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                            <h3>{{trans('general.page.howItWorks.sections.1.title')}}</h3>
                            <p>{!!trans('general.page.howItWorks.sections.1.desc')!!}</p>
                        </div>
                    </div>
                </div>
                <!-- Vertical tabs content02 end--> 
                <!-- Vertical tabs content03 start-->
                <div class="tab-pane fade" id="brandstrategy" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5"><img src="images/branding.jpg" alt=""></div>
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                            <h3>{{trans('general.page.howItWorks.sections.2.title')}}</h3>
                            <p>{!!trans('general.page.howItWorks.sections.2.desc')!!}</p>
                        </div>
                    </div>
                </div>
                <!-- Vertical tabs content03 end--> 
                <!-- Vertical tabs content04 start-->
                <div class="tab-pane fade" id="generalmedicine" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5"><img src="images/social-marketing.jpg" alt=""></div>
                        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
                            <h3>{{trans('general.page.howItWorks.sections.3.title')}}</h3>
                            <p>{!!trans('general.page.howItWorks.sections.3.desc')!!}</p>
                        </div>
                    </div>
                </div>
                <!-- Vertical tabs content04 end--> 
            </div>
        </div>
        <!-- Vertical tabs content end--> 
    </div>
</div>
