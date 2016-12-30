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
            @include ('content.lesson._lesson_card', ['lesson' => $lesson])
            @empty
            <p>No Courses</p>
            @endforelse
        </ul>

    </div>
</section>
@endsection
