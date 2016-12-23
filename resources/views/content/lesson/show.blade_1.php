@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lesson {{ $lesson->getId() }}</div>
                <div class="panel-body">

                    <a href="{{ url('lesson/posts/' . $lesson->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                    {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['lesson/posts', $lesson->getId()],
                    'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Post',
                    'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $lesson->getId() }}</td>
                                </tr>
                                <tr>
                                    <th> Title </th>
                                    <td> {{ $lesson->getName() }} </td>
                                </tr>
                                <tr>
                                    <th> Content </th>
                                    <td> {{ $lesson->content }} </td>
                                </tr>
                                <tr>
                                    <th> Category </th>
                                    <td> {{ $lesson->category }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
