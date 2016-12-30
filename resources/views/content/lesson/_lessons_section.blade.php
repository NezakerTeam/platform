<ul class="portfolioContainer row">
    @forelse ($lessons as $lesson)
    @include ('content.lesson._lesson_card', ['lesson' => $lesson])
    @empty
    <p>No Lessons</p>
    @endforelse
</ul>
