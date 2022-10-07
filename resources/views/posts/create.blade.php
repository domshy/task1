@extends('layout.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <hr />
    <h1>ADD USER</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('fullname', 'Fullname') }}
        {{ Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'Fullname']) }}
    </div>
    <div class="form-group">
        {{ Form::label('birth_place', 'Place of Birth') }}
        {{ Form::text('birth_place', '', ['class' => 'form-control', 'placeholder' => 'Place of Birth']) }}
    </div>
    <div class="form-group">
        {{ Form::label('gender', 'Gender') }}
        {{ Form::select('gender', ['Female' => 'Female', 'Male' => 'Male']) }}
    </div>
    <div class="form-group">
        {{ Form::label('dob', 'Birthday') }}
        {{ Form::date('dob', \Carbon\Carbon::now()) }}
    </div>
    <div class="form-group">
        {{ Form::label('contact', 'Contact') }}
        {{ Form::text('contact', '', ['class' => 'form-control', 'placeholder' => 'Contact']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'email']) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::textarea('address', '', ['class' => 'form-control', 'placeholder' => 'Address']) }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
