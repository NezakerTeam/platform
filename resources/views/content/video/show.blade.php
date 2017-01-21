@extends('layouts.app')

@section('main-content')
<!--start wrapper-->
<section class="wrapper">
    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>{{$content->getLesson()->getName()}}</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li></li>
                            <li>{{$content->getLesson()->getSubject()->getGrade()->getStage()->getName()}}</li>
                            <li>{{$content->getLesson()->getSubject()->getGrade()->getName()}}</li>
                            <li>{{$content->getLesson()->getSubject()->getName()}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="content blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                    <div class="blog_large">
                        <article class="post">
                            <div class="">
                                <figure class="post_video">
                                    <div class="blogVid">
                                        <div class="video-header" style="background-size: cover;">
                                            <div class="embed-responsive embed-responsive-16by9 video">
                                                <iframe class="embed-responsive-item" 
                                                        width="560" height="315"
                                                        src="https://www.youtube.com/embed/{{$content->getYoutubeVideoId()}}"
                                                        frameborder="0" allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="video_meta">   
                                    <div class="sharing-buttons">
                                        <div class="addthis_inline_share_toolbox pull-left"></div>
                                    </div>
                                    <div class="author">
                                        <span class="by">شرح/</span class="label"> {{$content->getAuthor()->getName()}}
                                    </div>
                                    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                                    <div class="description">
                                        <h3><span>ملخص الدرس</span></h3>
                                        <p>{{$content->getDescription()}}</p>
                                    </div>
                                </div>
                            </div>
                            <section id="comments">
                                <div id="disqus_thread"></div>
                            </section>

                        </article>
                    </div>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </section>
</section>
<!--end wrapper--> 

@endsection
