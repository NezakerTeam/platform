@extends('layouts.app')

@section('content')
<div class="container">
    <div class="heading">
        <h1><span>{{trans('auth.form.login.title')}}</span></h1>
        <p>{{trans('auth.form.login.desc')}}</p>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! form($loginForm) !!}

                    <span>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            {{trans('auth.form.login.forgotPassword')}}
                        </a>
                    </span>

                    <span>
                        <strong>{{trans('auth.form.login.notRegisteredYet')}}</strong>
                        <a class="btn btn-link" href="{{route('register')}}">{{trans('auth.form.login.notRegisteredYet.register')}}</a>
                    </span>

                    <span>
                        <a href="{{ url(route('socialAuth.facebook')) }}" class="btn btn-social btn-lg btn-facebook"><i class="fa fa-facebook"></i> ادخل بالفيسبوك</a>
                    </span>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
