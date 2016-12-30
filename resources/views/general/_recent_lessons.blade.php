<section class="grey_section section_gap" id="courses">
    <div class="container">
        <div class="heading">
            <h1><span>أحدث الدروس </span></h1>
            <p>Phasellus غير دولور nibh. Nullam elementum تيلوس pretium feugiat.<br>
                وكالات التصنيف الائتماني القول المأثور TELLUS وثيقة الهوية الوحيدة، السيرة sollicitudin tincidunt هوز في. سد سد tincidunt tristique ENIM sollcitudin.</p>
        </div>
        <ul class="hover_listing row">
            @forelse ($recentLessons as $lesson)
            @include ('content.lesson._lesson_card', ['lesson' => $lesson])
            @empty
            <p>No Lessons</p>
            @endforelse
        </ul>
        <p class="text-center noPadd">
            <a href="{{route('lesson.all')}}" class="btn btn-primary btn-lg" role="button">عرض جميع الدروس</a>
        </p>
    </div>
</section>
