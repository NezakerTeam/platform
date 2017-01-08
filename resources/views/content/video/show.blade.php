@extends('layouts.app')

@section('content')
<!--start wrapper-->
<section class="wrapper">
    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>{{$content->getLesson()->getName()}}</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li>You are here:</li>
                            <li><a href="index-2.html">Home</a></li>
                            <li><a href="index-2.html">Blog</a></li>
                            <li>{{$content->getLesson()->getName()}}</li>
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
                            <div class="post_content medium">
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
                                <div class="post_meta">
                                    <h2>{{$content->getLesson()->getName()}}</h2>
                                    <div class="metaInfo"> 
                                        <span>By {{$content->getAuthor()->getName()}} </span>
                                        <span><a href="#">Webdesign, Media, Logo</a> </span> 
                                        <span><a href="#" class="admin">5</a> Comments</span>
                                    </div>
                                    {{$content->getDescription()}}
                                </div>
                            </div>
                            <section id="comments">
                                <h6 class="section-title">3 Comments</h6>
                                <p>Comments are optional and I am editable! Whoop!</p>
                                <ol class="comments-list">
                                    <li class="comment">
                                        <article> <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=50" alt="Image" class="avatar">
                                            <div class="comment-meta">
                                                <h5 class="author">Admin, January 06, 2011 . <a href="#" class="comment-reply-link">Reply</a></h5>
                                            </div>
                                            <!-- end .comment-meta -->

                                            <div class="comment-body">
                                                <p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus.</p>
                                            </div>
                                            <!-- end .comment-body --> 

                                        </article>
                                        <ul class="children">
                                            <li class="comment">
                                                <article> <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=50" alt="Image" class="avatar">
                                                    <div class="comment-meta">
                                                        <h5 class="author">Admin, January 06, 2011 . <a href="#" class="comment-reply-link">Reply</a></h5>
                                                    </div>
                                                    <!-- end .comment-meta -->

                                                    <div class="comment-body">
                                                        <p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus.</p>
                                                    </div>
                                                    <!-- end .comment-body --> 

                                                </article>
                                            </li>
                                        </ul>
                                        <!-- end .children --> 

                                    </li>
                                    <li class="comment">
                                        <article> <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=50" alt="Image" class="avatar">
                                            <div class="comment-meta">
                                                <h5 class="author">Admin, January 06, 2011 . <a href="#" class="comment-reply-link">Reply</a></h5>
                                            </div>
                                            <!-- end .comment-meta -->

                                            <div class="comment-body">
                                                <p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus.</p>
                                            </div>
                                            <!-- end .comment-body --> 

                                        </article>
                                    </li>
                                </ol>
                            </section>
                            <section id="respond">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blogleft contact">
                                        <form method="post" action="#" name="cform" id="cform">
                                            <h3 class="contactTitle">Leave a Comment</h3>
                                            <p>Curabitur tincidunt est sit amet nibh imperdiet dapibus. Praesent tristique diam eros,</p>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form-row">
                                                    <input type="text" class="normal" id="name" placeholder="Name" name="name">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form-row">
                                                    <input type="email" class="normal" id="email" placeholder="Email Address" name="email">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group form-row">
                                                    <textarea name="comments" placeholder="Comments" rows="4" class="normal"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <input type="submit" id="submit" name="send" value="COMMENT" class="button">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
