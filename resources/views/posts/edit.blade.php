@extends('layout.app')

@section('content')
    <h1>Edit Detail</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('fullname', 'Fullname') }}
        {{ Form::text('fullname', $post->fullname, ['class' => 'form-control', 'placeholder' => 'Fullname']) }}
    </div>
    <div class="form-group">
        {{ Form::label('birth_place', 'Place of Birth') }}
        {{ Form::text('birth_place', $post->birth_place, ['class' => 'form-control', 'placeholder' => 'Place of Birth']) }}
    </div>

    <div class="form-group">
        {{ Form::label('', 'Gender') }}
        <select name="gender" class="form-control">
            <option hidden selected>{{ $post->gender }}</option>
            <option value="male">Female</option>
            <option value="female">Male</option>
        </select>
    </div>

    <div class="form-group">
        <label for="dob">Birthdate</label>
        <input type="date" class="form-control" name="dob" id="dob" value={{ $post->dob }} />
        <div class="agehere" style="margin-top: 8px;"></div>
    </div>

    <div class="form-group">
        {{ Form::label('contact', 'Contact') }}
        {{ Form::text('contact', $post->contact, ['class' => 'form-control', 'placeholder' => 'Contact']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', $post->email, ['class' => 'form-control', 'placeholder' => 'email']) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::textarea('address', $post->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
    </div>
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
