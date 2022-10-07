@extends('layout.app')

@section('content')
    <a href='/dashboard'>Back</a>
    <h1>Students</h1>
    <a href="/posts/create" class="btn btn-primary">Add Student</a>
    <a href="/download-pdf" class="btn btn-success">Download as PDF</a>
    <a href="/export-csv" class="btn btn-danger">Download as CSV</a>
    <a href="/export-excel" class="btn btn-warning">Download as EXCEL</a>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Choose File</label>
                        <input type="file" name="file" class="form-control" />
                    </div>
                    <input type="submit" class="btn btn-priamry" />
                </form>
            </div>
        </div>
    </div>

    <hr />
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="well" style="margin-top:5vh;">
                <h3><a href="/posts/{{ $post->id }}"> {{ $post->fullname }}</a></h3>

                <p>Added on: {{ $post->created_at }}</p>
            </div>
        @endforeach
    @else
        <p>No student found</p>
    @endif
@endsection
