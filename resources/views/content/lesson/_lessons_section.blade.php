<ul class="row list-unstyled">
    @forelse ($contents as $video)
    <li class="content-card col-xs-12 col-sm-6 col-md-4 col-lg-4">
        @include ('content.video._video_card', ['video' => $video])
    </li>
    @empty
    <p>No Lessons</p>
    @endforelse
</ul>
