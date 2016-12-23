@extends('layouts.app')

@section('content')
<section class="grey_section" id="courses">
    <div class="container">
        <h1><span>دروسي</span></h1>

        <p class="text-center noPadd">
            <a href="{{route('lesson.create')}}" class="btn btn-primary btn-lg" role="button">أضف درس جديد</a>
        </p>

        <ul class="hover_listing row">
            @forelse ($lessons as $lesson)
            <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
                <div class="img"><a href="course-details.html"><img src="images/courses/course1.jpg" alt=""></a><a class="play-btn" href="course-details.html"><i class="fa fa-play fa-3"></i></a></div>
                <h3><a href="course-details.html">{{$lesson->getName()}}</a></h3>
                <p>@datetime($lesson->getCreatedAt())</p>
            </li> 
            @empty
            <p>No Courses</p>
            @endforelse
        </ul>

    </div>
</section>
@endsection
