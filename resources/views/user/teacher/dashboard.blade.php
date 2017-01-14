@extends('layouts.app')

@section('content')
<div class="container">
    <section>
        <div class="heading">
            <h1><span>دروسي</span></h1>
            <p class="text-center noPadd">
                <a href="{{route('content.create')}}" class="btn btn-primary btn-lg" role="button">أضف درس جديد</a>
            </p>
        </div>

        <ul class="hover_listing row">
            @forelse ($activeContents as $content)
            <li class="content-card col-xs-12 col-sm-6 col-md-3 col-lg-3">
                @include ('content.video._video_card', ['video' => $content])
            </li>

            @empty
            <p>No Courses</p>
            @endforelse
        </ul>       
    </section>

    @if (count($pendingContent) > 0)
    <section class="section_gap">
        <div class="heading">
            <h1><span>دروس تحت المراجعة</span></h1>
        </div>
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
    </section>
</div>

@endif

@endsection
