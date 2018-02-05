@extends('layouts.app')

@section('content')
<div class="container">
    <section>
        <div class="heading">
            <p class="text-center noPadd">
                <a href="{{route('student.create')}}" class="btn btn-primary btn-lg" role="button">أضف بيانات أبنائك</a>
            </p>
        </div>

        @foreach ($studentRelations as $studentRelation)
        @if (count($studentRelation->student->grade->getActiveSubjects()) > 0)
        @include ('user.parent._child', ['student' => $studentRelation->student])
        @endif
        @endforeach
        </ul>       
    </section>

</div>

@endsection
