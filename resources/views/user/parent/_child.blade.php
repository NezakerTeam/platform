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
        @foreach ($student->grade->subjects as $subject)
        <div class="col-md-3">
            <a href="{{route('subject.show', ['id' => $subject->getId()])}}" target="_blank">
                <img src="" alt="{{$subject->name}}" class="img-thumbnail img-responsive"">
            </a>
        </div>
        @endforeach
    </div>
</section>