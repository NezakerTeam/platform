@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                    {!! form_start($form) !!}
                    {!! form_end($form, $renderRest = true) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
