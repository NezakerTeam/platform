<div class="col-xs-3">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs custom-nav-tabs" role="tablist">
        <li class="active" role="presentation">
            <a href="#lessons_list_{{$stageId}}_{{$gradeId}}_0" class="subject-filter"
               data-stage-id="{{$stageId}}" data-grade-id="{{$gradeId}}" data-subject-id="0"
               aria-controls="home" role="tab" data-toggle="tab">
                {{trans('content.all')}}
            </a>
        </li>
        @foreach ($subjects as $subject)
        <li role="presentation">
            <a href="#lessons_list_{{$stageId}}_{{$gradeId}}_{{$subject->getId()}}" class="subject-filter" 
               data-stage-id="{{$stageId}}" data-grade-id="{{$gradeId}}" data-subject-id="{{$subject->getId()}}" 
               aria-controls="profile" role="tab" data-toggle="tab" >
                {{$subject->getName()}}
            </a>
        </li>
        @endforeach
    </ul>
</div>

<div class="col-xs-9">
    <!-- Tab panes --> 
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active lessons-list" id="lessons_list_{{$stageId}}_{{$gradeId}}_0">
            @include ('content.lesson._lessons_section', ['lessons' => $lessons, 'contents' => $contents])
        </div>
        @foreach ($subjects as $subject)
        <div role="tabpanel" class="tab-pane lessons-list" id="lessons_list_{{$stageId}}_{{$gradeId}}_{{$subject->getId()}}">
        </div>
        @endforeach
    </div>
</div>


