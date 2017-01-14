<div class="container">
    <div class="heading">
        <h1><span>{{trans('general.form.contactUs.title')}}</span></h1>
        <p>{{trans('general.form.contactUs.desc')}}</p>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! form($contactUsForm) !!}
                </div>
            </div>

        </div>
    </div>
</div>
