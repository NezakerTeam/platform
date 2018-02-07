<section class="section_gap">
    <div class="heading">
        <h3>
            <ul class="list-inline">
                <li>{{trans('user.parent.dashboard.child.title', ['name' => $stage->name])}}</li>
            </ul>
        </h3>

    </div>
    <div class="row">
        @foreach ($stage->getActiveGrades() as $grade)
        <div class="col-md-3">
            <p class="text-center">{{$grade->name}}</p>

            <a href="{{route('subject.show', ['id' => $grade->getId()])}}" target="_blank">
                <img src="{{$grade->getImageUrl()}}" alt="{{$grade->name}}" class="center-block subject-thumb img-thumbnail img-responsive img-rounded">
            </a>
        </div>
        @endforeach
    </div>
</section>