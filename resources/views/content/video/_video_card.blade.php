@php 
$videoUrl = route('content.show', ['id' => $video->getId()]);
@endphp
<div class="img">
    <a href="{{$videoUrl}}">
        <img src="{{$video->getThumbnail()}}" alt="{{$video->getName()}}">
    </a>
</div>
<p>
    <a href="{{$videoUrl}}">{{$video->getLesson()->getName()}}</a>
    - {{$video->getLesson()->getSubject()->getName()}}
    - {{$video->getLesson()->getSubject()->getGrade()->getName()}}
    - {{$video->getLesson()->getSubject()->getGrade()->getStage()->getName()}}
    <span class="pull-left">@datetime($video->getCreatedAt())</span>
</p>
