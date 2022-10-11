@extends('layout.app')

@section('content')
    <style>
        .emp {
            border-collapse: collapse;
            font-size: 0.9em;
            width: 100%;
            widows: 40vw;
            font-family: sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .emp thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .emp th,
        .emp td {
            padding: 15px;
        }

        .emp th,
        .emp tr {
            padding: 12px 15px;
        }

        .emp tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .emp tbody tr:nth-of-type(even) {
            background-color: lightblue;
        }

        .emp tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
    <a href='/dashboard'>Back</a>
    <h1>Students</h1>
    <a href="/students/create" class="btn btn-primary">Add Student</a>
    <a href="/download-pdf" class="btn btn-success">Download as PDF</a>
    <a href="/export-csv" class="btn btn-danger">Download as CSV</a>
    <a href="/export-excel" class="btn btn-warning">Download as EXCEL</a>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <br />
                        <label for="file">Import File</label>
                        <input type="file" name="file" class="form-control" />
                    </div>
                    <input type="submit" class="btn btn-success" />
                </form>
            </div>
        </div>
    </div>

    <hr />
    @if (count($students) > 0)
        {{-- <div class="well" style="margin-top:5vh;">
                <h3><a href="/students/{{ $student->id }}"> {{ $student->fullname }}</a></h3>

                <p>Added on: {{ $student->created_at }}</p>
            </div> --}}

        <table class="emp">
            <thead>
                <tr>
                    <th>Student No.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student_no }}</td>
                        <td>{{ $student->fullname }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <a href="/students/{{ $student->id }}/edit" class="btn btn-default">Edit</a>
                            {!! Form::open([
                                'action' => ['StudentController@destroy', $student->id],
                                'method' => 'POST',
                                'class' => 'pull-right',
                            ]) !!}

                            {{ Form::hidden('_method', 'DELETE') }} &nbsp;
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $students->links() }} --}}
    @else
        <p>No student found</p>
    @endif
@endsection
