<div class="container">
    <div class="heading">
        <h1><span>هل لديك سؤال</span></h1>
        <p>Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat.<br>
            وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
    </div>
    <div class="row">
        <!-- contact from start-->
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="float: right !important;">
            <div id="message"></div>
            {!! form_start($contactUsForm) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                    {!! form_errors($contactUsForm->name)!!}
                    {!! form_widget($contactUsForm->name)!!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                    {!! form_errors($contactUsForm->email)!!}
                    {!! form_widget($contactUsForm->email)!!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                    {!! form_errors($contactUsForm->comment)!!}
                    {!! form_widget($contactUsForm->comment)!!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {!! form_widget($contactUsForm->submit, ['attr'=> ['class' => 'input-button', 'width' => '40%']])!!}
                </div>
            </div>
            {!! form_end($contactUsForm) !!}
        </div>
        <!-- contact from end--> 
    </div>
</div>
