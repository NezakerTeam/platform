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
            </ul>
        </h3>

    </div>
    <div class="row">
        @foreach ($student->grade->getActiveSubjects() as $subject)
        <div class="col-md-3">
            <p class="text-center">{{$subject->name}}</p>

            <a href="{{route('subject.show', ['id' => $subject->getId()])}}" target="_blank">
                <img src="{{$subject->getImageUrl()}}" alt="{{$subject->name}}" class="center-block subject-thumb img-thumbnail img-responsive img-rounded">
            </a>
        </div>
        @endforeach
    </div>
</section>