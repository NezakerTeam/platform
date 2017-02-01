<div>
    <p><b>{!!trans('content.form.video.upload_guide_desc')!!}</b></p>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="http://www.youtube.com/embed/V2kTbjA3F60">
                    <img class="img-responsive center-block" src="{{asset(elixir('images/google-drive-vector-logo.png'))}}" />
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="https://www.youtube.com/embed/t7wQ1f8rx-s">
                    <img class="img-responsive center-block" src="{{asset(elixir('images/dropbox-vector-logo.png'))}}" />
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div>
                    <iframe width="100%" height="350" src=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@section('jsBodyEnd')
@parent

<script>
    $(document).ready(function () {
        autoPlayYouTubeModal();

    });
</script>
@endsection

