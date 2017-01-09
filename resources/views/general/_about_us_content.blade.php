<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="video_preview">
                <img src="{{asset(elixir('images/video.gif'))}}" alt="">
                <a title="تاريخ الرسوم المتحركة من بولندا" 
                   class="play-btn rellight" 
                   href="http://www.youtube.com/watch?v=2DrXgj1NwN8" 
                   
                   type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"
                   >
                    <i class="fa fa-play fa-2"></i>
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 watch_text">
            <section id="aboutus">
                <div class="heading">
                    <h1><span>عن نذاكر</span></h1>
                    {!! trans('general.aboutUs.desc') !!}
                </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
