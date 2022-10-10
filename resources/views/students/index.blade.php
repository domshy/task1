@extends('layout.app')

@section('content')
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
                        <br/>
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
        @foreach ($students as $student)
            <div class="well" style="margin-top:5vh;">
                <h3><a href="/students/{{ $student->id }}"> {{ $student->fullname }}</a></h3>

                <p>Added on: {{ $student->created_at }}</p>
            </div>
        @endforeach
        {{-- {{ $students->links() }} --}}
    @else
        <p>No student found</p>
    @endif
@endsection
