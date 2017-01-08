@extends('layouts.app')

@section('content')
<section class="grey_section" id="courses">
    <div class="container">
        <h1><span>دروسي</span></h1>

        <ul class="hover_listing row">
            @forelse ($activeContents as $content)
            <li class="content-card col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
                @include ('content.video._video_card', ['video' => $content])
            </li>

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
                        <th>{{trans('content.entity.name')}}</th>
                        <th>{{trans('subject.name')}}</th>
                        <th>{{trans('general.createdAt')}}</th>
                    </tr> 
                </thead>
                <tbody> 
                    @forelse ($pendingContent as $content)
                    <tr>                 
                        <td>{{$content->getLesson()->getName()}}</td> 
                        <td>
                            {{$content->getLesson()->getSubject()->getName()}}
                            - {{$content->getLesson()->getSubject()->getGrade()->getName()}}
                            - {{$content->getLesson()->getSubject()->getGrade()->getStage()->getName()}}
                        </td> 
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
