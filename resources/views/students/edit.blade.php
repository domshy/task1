@extends('layout.app')

@section('content')
    <h1>Edit Detail</h1>
    {!! Form::open(['action' => ['StudentController@update', $student->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('fullname', 'Fullname') }}
        {{ Form::text('fullname', $student->fullname, ['class' => 'form-control', 'placeholder' => 'Fullname']) }}
    </div>
    <div class="form-group">
        {{ Form::label('birth_place', 'Place of Birth') }}
        {{ Form::text('birth_place', $student->birth_place, ['class' => 'form-control', 'placeholder' => 'Place of Birth']) }}
    </div>

    <div class="form-group">
        {{ Form::label('', 'Gender') }}
        <select name="gender" class="form-control">
            <option hidden selected>{{ $student->gender }}</option>
            <option value="male">Female</option>
            <option value="female">Male</option>
        </select>
    </div>

    <div class="form-group">
        <label for="dob">Birthdate</label>
        <input type="date" class="form-control" name="dob" id="dob" value={{ $student->dob }} />
        <div class="agehere" style="margin-top: 8px;"></div>
    </div>

    <div class="form-group">
        {{ Form::label('contact', 'Contact') }}
        {{ Form::text('contact', $student->contact, ['class' => 'form-control', 'placeholder' => 'Contact']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', $student->email, ['class' => 'form-control', 'placeholder' => 'email']) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::textarea('address', $student->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
    </div>
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
