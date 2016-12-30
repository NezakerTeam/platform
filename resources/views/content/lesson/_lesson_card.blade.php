@php $lessonUrl = route('lesson.show', ['id' => $lesson->getId()]) @endphp
<li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
    <div class="img">
        <a href="{{$lessonUrl}}">
            <img src="{{$lesson->getThumbnail()}}" alt="{{$lesson->getName()}}">
        </a>
    </div>
    <h3>
        <a href="{{$lessonUrl}}">{{$lesson->getName()}}</a>
    </h3>
    <p>@datetime($lesson->getCreatedAt())</p>
</li>
