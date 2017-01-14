@extends('layouts.app')

@section('content')
<div class="container">
    <div class="heading">
        <h1><span>{{trans('user.form.edit.title')}}</span></h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! form($form) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
