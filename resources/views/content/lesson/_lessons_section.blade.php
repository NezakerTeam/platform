<ul class="portfolioContainer row">
    @forelse ($lessons as $lesson)
    <li class="course1 col-xs-6 col-sm-4 col-md-3 col-lg-3">
        <div class="lightCon">
            <a href="{{route('lesson.show', ['id' => $lesson->getId()])}}">
                <span class="hoverBox">
                    <div>
                        <h4>{{$lesson->getName()}}</h4>
                    </div>
                </span>
            </a>
            <img src="{{$lesson->getThumbnail()}}" alt="" > 
        </div>
    </li>
    @empty
    <p>No Lessons</p>
    @endforelse
</ul>
