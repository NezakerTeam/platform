<section class="section_gap">
    <div class="heading">
        <h3>
            <ul class="list-inline">
                <li>{{trans('user.parent.dashboard.child.title', ['name' => $stage->name])}}</li>
            </ul>
        </h3>

    </div>
    @php $activeGrades = $stage->getActiveGrades() @endphp

    <div class="row">
        @if (count($activeGrades) > 0)
        <div class="col-xs-3">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs custom-nav-tabs" role="tablist">
                @foreach ($activeGrades as $grade)
                <li class="{{$loop->first? 'active':''}}" role="presentation">
                    <a href="#subjects_list_{{$stage->getId()}}_{{$grade->getId()}}" class="subject-filter" 
                       data-stage-id="{{$stage->getId()}}" data-grade-id="{{$grade->getId()}}"
                       aria-controls="profile" role="tab" data-toggle="tab" >
                        {{$grade->getName()}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-xs-9">
            <div>
                <!-- Tab panes --> 
                <div class="tab-content">
                    @foreach ($activeGrades as $grade)
                    <div role="tabpanel" class="tab-pane lessons-list {{$loop->first? 'active':''}}" id="subjects_list_{{$stage->getId()}}_{{$grade->getId()}}">
                        @forelse ($grade->getActiveSubjects() as $subject)
                        <div class="col-md-3">
                            <a href="{{route('subject.show', ['id' => $subject->getId()])}}" target="_blank">
                                <img src="{{$subject->getImageUrl()}}" alt="{{$subject->name}}" class="center-block subject-thumb img-thumbnail img-responsive img-rounded">
                            </a>
                            <p class="text-center">{{$subject->name}}</p>
                        </div>
                        @empty
                        <p>لم يتم إضافة محتوي بعد</p>
                        @endforelse
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>