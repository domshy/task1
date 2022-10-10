@extends('layout.app')

@section('content')

    <a href="/students" class="btn btn-default">Go Back</a>
    <h1>{{ $student->fullname }}</h1>
    <small>Written on {{ $student->created_at }}</small>
    <div>
        <h3>Gender: {{ $student->gender }}</h3>
        <h3>Birthday: {{ $student->dob }}</h3>
        <h3>Contact: {{ $student->contact }}</h3>
        <h3>Email: {{ $student->email }}</h3>
        <h3>Address: {{ $student->address }}</h3>
    </div>
    <hr />
    <a href="/students/{{ $student->id }}/edit" class="btn btn-default">Edit</a>

    {!! Form::open([
        'action' => ['StudentController@destroy', $student->id],
        'method' => 'POST',
        'class' => 'pull-right',
    ]) !!}

    {{ Form::hidden('_method', 'DELETE') }};
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    
    {!! Form::close() !!}
@endsection
