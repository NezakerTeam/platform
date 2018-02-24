<section class="section_gap">
    <div class="heading">
        <h3>
            <ul class="list-inline">
                <li>{{trans('user.parent.dashboard.child.title', ['name' => $student->name])}}</li>
                <li>- {{$student->grade->name}}</li>
                <li>- {{$student->grade->stage->name}}</li>
                <li>
                    <a href="{{route('student.edit',  ['id' => $student->getId()])}}" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        تعديل البيانات
                    </a>
                </li>
                @if (null != $assessment = $student->getAssessment())
                <li>
                    <a href="{{$assessment->link}}" class="btn btn-default btn-xs" target="_blank">
                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                        ملء الاستبيان
                    </a>
                </li>
                @endif
            </ul>
        </h3>

    </div>
    <div class="row">
        @forelse ($student->grade->getActiveSubjects() as $subject)
        <div class="col-md-2">
            <a href="{{route('subject.show', ['id' => $subject->getId()])}}" target="_blank">
                <img src="{{$subject->getImageUrl()}}" alt="{{$subject->name}}" class="center-block subject-thumb img-thumbnail img-responsive img-rounded">
            </a>
            <p class="text-center">{{$subject->name}}</p>
        </div>
        @empty
        <p>لم يتم إضافة محتوي بعد</p>
        @endforelse
    </div>
</section>