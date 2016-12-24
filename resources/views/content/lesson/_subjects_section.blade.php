<div class="portfolioFilter">
    <ul>
        <li><a href="#" data-filter="*" class="current">All</a></li>
        @forelse ($subjects as $subject)
        <li>
            <a href="#" class="subject-filter" 
               data-subject-id="{{$subject->getId()}}" data-stage-id="{{$stageId}}">
                {{$subject->getName()}}
            </a>
        </li>
        @empty
        <p>No Subjects</p>
        @endforelse
    </ul>
</div>

<div class="lessons-list" id="lessons_list_{{$stageId}}">
    @include ('content.lesson._lessons_section', ['lessons' => $lessons])
</div>
