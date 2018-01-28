@extends('layouts.app')

@section('content')
<div class="container">
    <section>
        <div class="heading">
            <p class="text-center noPadd">
                <a href="{{route('student.create')}}" class="btn btn-primary btn-lg" role="button">أضف بيانات أبنائك</a>
            </p>
        </div>

        @foreach ($studentRelations as $studentRelation)
        @include ('user.parent._child', ['student' => $studentRelation->student])
        @endforeach
        </ul>       
    </section>

    @if (count($pendingContent) > 0)
    <section class="section_gap">
        <div class="heading">
            <h1><span>فيديوهات تحت المراجعة</span></h1>
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
