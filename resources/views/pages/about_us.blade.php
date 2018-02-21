@extends('layouts.app')

@section('content')

<div class="container">
    <div class="heading">
        <h1><span>{{$page['title']}}</span></h1>
    </div>   
    {!! $page['content'] !!}

    <section id="comments">
        <div id="disqus_thread"></div>
    </section>
</div>

@endsection
