@extends('layouts.master')

@section('title')
Personnel Ltd | File Upload
@endsection

@section('content')
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        @include('layouts.info')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Upload csv file</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('csvImport') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile" name="csv_file">
                        @error('csv_file')
                        <span class="red">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info">Upload</button>
                    <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection