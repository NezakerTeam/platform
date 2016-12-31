@extends('layouts.app')

@section('content')
<section class="grey_section" id="courses">
    <div class="container">
        <h1><span>دروسي</span></h1>

        <ul class="hover_listing row">
            @forelse ($activeContents as $content)
            @include ('content.video._video_card', ['video' => $content])
            @empty
            <p>No Courses</p>
            @endforelse
        </ul>

        <p class="text-center noPadd">
            <a href="{{route('content.create')}}" class="btn btn-primary btn-lg" role="button">أضف درس جديد</a>
        </p>
    </div>
</section>

<section class="white_section section_gap" id="courses">
    <div class="container">
        <h1><span>دروس تحت المراجعة</span></h1>

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Lesson</th>
                        <th>Added on</th>
                    </tr> 
                </thead>
                <tbody> 
                    @forelse ($pendingContent as $content)
                    <tr>
                        <td>{{$content->getLesson()->getSubject()->getName()}}</td> 
                        <td>{{$content->getLesson()->getName()}}</td> 
                        <td>{{$content->getCreatedAt()}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>@mdo</td> 
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
