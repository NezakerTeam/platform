@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('content.form.title.create')}}</div>
                <div class="panel-body">
                    @include ('content.video.form')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
