@extends('layouts.app')

@section('content')

<div class="container">
    <div class="heading">
        <h1><span>{{trans('general.page.termsAndConditions.title')}}</span></h1>
        <p>{{trans('general.page.termsAndConditions.desc')}}</p>
    </div>
    <div class="col-md-11 col-md-offset-1"> 
        <div class="row"> 
            <ul>
                @for ($i = 0; $i < 4; $i++)
                <li>
                    <p>{{trans("general.page.termsAndConditions.rules.$i")}}</p>
                </li> 
                @endfor
            </ul>
        </div>
    </div>
</div>

@endsection
