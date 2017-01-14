@extends('layouts.app')

@section('content')
<div class="container">
    <div class="heading">
        <h1><span>{{trans('content.form.video.create.title')}}</span></h1>
        <p>{!!trans('content.form.video.create.desc')!!}</p>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include ('content.video.form')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
