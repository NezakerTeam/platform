@php 
$videoUrl = route('content.show', ['id' => $video->getId()]);
@endphp
    <a href="{{$videoUrl}}">
        <img src="{{$video->getThumbnail()}}" alt="{{$video->getName()}}">
    </a>
<span>
    <h4>{{$video->getLesson()->getSubject()->getName()}} - {{$video->getLesson()->getName()}}</h4>
    <p>{{$video->getAuthor()->getName()}}</p>
    <!--    - {{$video->getLesson()->getSubject()->getGrade()->getName()}}
        - {{$video->getLesson()->getSubject()->getGrade()->getStage()->getName()}}-->
    <!--    <span class="pull-left">@datetime($video->getCreatedAt())</span>-->
</span>
