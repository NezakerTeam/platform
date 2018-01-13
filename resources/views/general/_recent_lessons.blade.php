<div class="container">
    <div class="heading">
        <h1><span>أحدث الفيديوهات </span></h1>
        <p>آخر مشاركات أعضاء نذاكر في قائمة الفيديوهات التالية ويمكن مشاهدة كل الفيديوهات على نذاكر بالضغط على عرض جميع الفيديوهات</p>
    </div>
    <ul class="hover_listing row">
        @forelse ($recentLessons as $lesson)
        <li class="content-card col-xs-12 col-sm-6 col-md-3 col-lg-3">
            @include ('content.video._video_card', ['video' => $lesson])
        </li>
        @empty
        <p>No Lessons</p>
        @endforelse
    </ul>
    <p class="text-center noPadd">
        <a href="{{route('lesson.all')}}" class="btn btn-primary btn-lg" role="button">عرض جميع الفيديوهات</a>
    </p>
</div>
