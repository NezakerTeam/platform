@extends('layouts.app')

@section('content')
<div class="container list-all-lesson">
    <div>
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#subjects_list_0_0"  class="btn-link"
                   aria-controls="subjects_list_0_0" role="tab" data-toggle="tab">{{trans('content.all')}}</a>
            </li>
            @forelse ($stages as $stage)
            <li role="presentation" class="dropdown">
                <a href="#" class="dropdown-toggle btn-link" id="stage_tab_{{$stage->getId()}}" data-toggle="dropdown"  
                   role="button" aria-haspopup="true" aria-controls="stage_tab_{{$stage->getId()}}-contents" aria-expanded="false">
                    {{$stage->getName()}} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="stage_tab_{{$stage->getId()}}" id="stage_tab_{{$stage->getId()}}-contents">
                    @foreach ($stage->getGrades(true) as $grade)
                    <li>
                        <a href="#subjects_list_{{$stage->getId()}}_{{$grade->getId()}}" class="grade-filter btn-link" 
                           id="grade_tab_{{$stage->getId()}}_{{$grade->getId()}}"
                           data-stage-id="{{$stage->getId()}}" data-grade-id="{{$grade->getId()}}"
                           aria-controls="subjects_list_{{$stage->getId()}}_{{$grade->getId()}}"
                           role="tab" data-toggle="tab"  aria-expanded="false">
                            {{$grade->getName()}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @empty
            <p>No Stages</p>
            @endforelse
        </ul>


        <div class="tab-content subjects-list" id="myTabContent" >
            <div class="tab-pane active" role="tabpanel" id="subjects_list_0_0" 
                 aria-labelledby="grade_tab_0_0">
                @include ('content.lesson._subjects_section', [
                'stageId' => 0,
                'gradeId' => 0,
                'subjects' => $subjects,
                'lessons' => $lessons,
                'contents' => $contents,
                ])
            </div>
            @foreach ($stages as $stage)

            <div class="tab-pane fade" role="tabpanel" id="subjects_list_{{$stage->getId()}}_0" 
                 aria-labelledby="grade_tab_{{$stage->getId()}}_0">
            </div>

            @foreach ($stage->getGrades(true) as $grade)

            <div class="tab-pane fade" role="tabpanel" id="subjects_list_{{$stage->getId()}}_{{$grade->getId()}}" 
                 aria-labelledby="grade_tab_{{$stage->getId()}}_{{$grade->getId()}}">
            </div>

            @endforeach

            @endforeach
        </div>
    </div>
</div>

@endsection

@section('jsBodyEnd')
<script>
    $(document).ready(function () {
        $(".list-all-lesson").on('click', '.grade-filter', function (e) {
            gradeId = $(this).data('grade-id');
            stageId = $(this).data('stage-id');
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{route('lesson.index.listSubjects')}}",
                data: {gradeId: gradeId, stageId: stageId},
                success: function (data) {
                    $("#subjects_list_" + stageId + "_" + gradeId).html(data);
                }
            });
            return true;
        });

        $(".list-all-lesson").on('click', '.subject-filter', function (e) {
            stageId = $(this).data('stage-id');
            gradeId = $(this).data('grade-id');
            subjectId = $(this).data('subject-id');

            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{route('lesson.index.listLessons')}}",
                data: {stageId: stageId, gradeId: gradeId, subjectId: subjectId},
                success: function (data) {
                    $("#lessons_list_" + stageId + "_" + gradeId + "_" + subjectId).html(data);
                }
            });
            return true;
        });
    });
</script>
@endsection
