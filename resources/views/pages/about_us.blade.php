@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 watch_text">
            <section id="aboutus">
                <div class="heading">
                    <h1><span>{{$page['title']}}</span></h1>
                    {!! $page['content'] !!}
                </div>
        </div>
    </div>
</div>


@endsection
