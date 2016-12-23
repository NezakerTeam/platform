@extends('layouts.app')

@section('content')

<section class="wrapper">
    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Portfolio</h2>
                    <nav id="breadcrumbs">
                        <ul>
                            <li>You are here:</li>
                            <li><a href="index-2.html">Home</a></li>
                            <li>Portfolio</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="container portfolio-center">

        @forelse ($stages as $stage)
        <section class="protfolio" id="ourwork">
            <div class="row">
                <div class="portfolioFilter">
                    <ul>
                        <li><a href="#" data-filter="*" class="current">All</a></li>
                        @foreach ($stage->getGrades(true) as $grade)
                        <li><a href="#" data-filter=".course1">{{$grade->getName()}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <ul class="portfolioContainer row">
                    <li class="course1 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon">
                            <a href="course-details.html">
                                <span class="hoverBox">
                                    <div>
                                        <h4>WordPress Essential Training</h4>
                                    </div>
                                </span>
                            </a>
                            <img src="images/courses/course1.jpg" alt="" > 
                        </div>
                    </li>
                    <li class="course1 course3 course4 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>Practicing Photographer</h4>
                                    </div>
                                </span></a> <img src="images/courses/course2.jpg" alt="" > </div>
                    </li>
                    <li class="course3 course4 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>Lightroom CC Essential</h4>
                                    </div>
                                </span></a> <img src="images/courses/course3.jpg" alt="" > </div>
                    </li>
                    <li class="course2 course3 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>Branding Thoughts</h4>
                                    </div>
                                </span></a> <img src="images/courses/course4.jpg" alt="" > </div>
                    </li>
                    <li class="course3 course1 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>HTML5 Bacis Traning</h4>
                                    </div>
                                </span></a> <img src="images/courses/course5.jpg" alt="" > </div>
                    </li>
                    <li class="course1 course2 course4 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>Marketing Tips</h4>
                                    </div>
                                </span></a> <img src="images/courses/course6.jpg" alt="" > </div>
                    </li>
                    <li class="course3 course1 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>Photoshop Training</h4>
                                    </div>
                                </span></a> <img src="images/courses/course7.jpg" alt="" > </div>
                    </li>
                    <li class="course1 course2 course4 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>Light & Shadow</h4>
                                    </div>
                                </span></a> <img src="images/courses/course8.jpg" alt="" > </div>
                    </li>
                    <li class="course1 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>Branding Thoughts</h4>
                                    </div>
                                </span></a> <img src="images/courses/course4.jpg" alt=""  > </div>
                    </li>
                    <li class="course1 course3 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>Practicing Photographer</h4>
                                    </div>
                                </span></a> <img src="images/courses/course2.jpg" alt="" > </div>
                    </li>
                    <li class="course3 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>Lightroom CC Essential</h4>
                                    </div>
                                </span></a> <img src="images/courses/course3.jpg" alt="" > </div>
                    </li>
                    <li class="course1 course3 col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="lightCon"> <a href="course-details.html"> <span class="hoverBox">
                                    <div>
                                        <h4>WordPress Essential Training</h4>
                                    </div>
                                </span></a> <img src="images/courses/course1.jpg" alt="" > </div>
                    </li>
                </ul>
            </div>
        </section>

        @empty
        <p>No Stages</p>
        @endforelse
    </div>
</section>

@endsection
