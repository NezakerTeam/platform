@extends('layouts.app')

@section('content')
<div class="container">
    <div class="heading">
        <h1><span>{{trans('auth.form.title.create')}}</span></h1>
        <p>{{trans('auth.form.desc')}}</p>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! form($form) !!}

                    <div style="margin-top:10px">
                        <strong>{{trans('auth.alreadyRegistered')}}</strong>
                        <a href="{{route('login')}}">{{trans('auth.alreadyRegistered.login')}}</a>
                        أو
                        <a href="{{ url(route('socialAuth.facebook')) }}" class="btn btn-social btn-lg btn-facebook"><i class="fa fa-facebook"></i> ادخل بالفيسبوك</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
