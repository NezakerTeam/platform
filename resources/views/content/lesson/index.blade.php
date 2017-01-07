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
                <h2>{{$stage->getName()}}</h2>
                <div class="portfolioFilter">
                    <ul>
                        <li>
                            <a href="#" class="grade-filter current"
                               data-grade-id="0" data-stage-id="{{$stage->getId()}}">
                                {{trans('content.all')}}
                            </a>
                        </li>
                        @foreach ($stage->getGrades(true) as $grade)
                        <li>
                            <a href="#" class="grade-filter" 
                               data-grade-id="{{$grade->getId()}}" data-stage-id="{{$stage->getId()}}">
                                {{$grade->getName()}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="subjects-list" id="subjects_list_{{$stage->getId()}}">
                    @include ('content.lesson._subjects_section', [
                    'subjects' => $subjects[$stage->getId()],
                    'lessons' => $lessons[$stage->getId()],
                    'contents' => $contents[$stage->getId()],
                    'stageId' => $stage->getId()
                    ])
                </div>
            </div>
        </section>
        @empty
        <p>No Stages</p>
        @endforelse
    </div>
</section>
@endsection

@section('jsBodyEnd')
<script>
    $(document).ready(function () {
        $(".wrapper").on('click', '.grade-filter', function (e) {
            gradeId = $(this).data('grade-id');
            stageId = $(this).data('stage-id');
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{route('lesson.index.listSubjects')}}",
                data: {gradeId: gradeId, stageId: stageId},
                success: function (data) {
                    $("#subjects_list_" + stageId).html(data);
                }
            });
            return false;
        });

        $(".wrapper").on('click', '.subject-filter', function (e) {
            subjectId = $(this).data('subject-id');
            stageId = $(this).data('stage-id');
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{route('lesson.index.listLessons')}}",
                data: {subjectId: subjectId, stageId: stageId},
                success: function (data) {
                    $("#lessons_list_" + stageId).html(data);
                }
            });
            return false;
        });
    });
</script>
@endsection
