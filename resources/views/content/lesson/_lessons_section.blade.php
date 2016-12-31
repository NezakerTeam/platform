<ul class="portfolioContainer row">
    @forelse ($contents as $video)
    @include ('content.video._video_card', ['video' => $video])
    @empty
    <p>No Lessons</p>
    @endforelse
</ul>
