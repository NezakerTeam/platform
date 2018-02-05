@extends('layouts.app')

@section('content')
<!--start wrapper-->
<section class="wrapper">
    <section class="content">
        <div class="container">
            <div class="heading">
                <h1><span>{{trans('subject.name')}} {{$subject->name}}</span></h1>
                <p>{{$subject->description}}</p>
            </div>

            <div class="panel-group row form-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach ($subject->lessons as $lesson)
                @if (count($lesson->getApprovedContents()) > 0)
                <div class="col-md-1"></div>
                <div class="col-md-5  form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$lesson->id}}">
                                    {{$lesson->name}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$lesson->id}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    @foreach ($lesson->getApprovedContents() as $content)
                                    <div class="col-md-4">
                                        <a href="{{route('content.show', ['id' => $content->getId()])}}" target="_blank">
                                            <img src="{{$content->thumbnail}}" alt="{{$content->description}}" class="img-thumbnail img-responsive"">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
</section>
<!--end wrapper--> 





@endsection