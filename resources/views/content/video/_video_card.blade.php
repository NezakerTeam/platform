@php $videoUrl = route('content.show', ['id' => $video->getId()]) @endphp
<li class="content-card col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd">
    <div class="img">
        <a href="{{$videoUrl}}">
            <img src="{{$video->getThumbnail()}}" alt="{{$video->getName()}}">
        </a>
    </div>
    <h3>
        <a href="{{$videoUrl}}">{{$video->getName()}}</a>
    </h3>
    <p>@datetime($video->getCreatedAt())</p>
</li>
