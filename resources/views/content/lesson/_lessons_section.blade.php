@php
$itemsPerRow = ($itemsPerRow)? : 3;
$midColSize = $largeColSize = 12/$itemsPerRow;
@endphp
<ul class="row list-unstyled">
    @forelse ($contents as $video)
    <li class="content-card col-xs-12 col-sm-6 col-md-{{$midColSize}} col-lg-{{$largeColSize}}">
        @include ('content.video._video_card', ['video' => $video])
    </li>
    @empty
    <p>No Lessons</p>
    @endforelse
</ul>
