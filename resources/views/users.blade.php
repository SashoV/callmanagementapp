@extends('layouts.master')

@section('title')
Personnel Ltd | Users
@endsection

@section('content')
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
                @php
                $index = 0;
                @endphp
                @foreach ($users as $user)
                @php
                $index++;
                @endphp
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $user }}</td>
                    <td><a href="{{ route('user', ['user' => $user]) }}" class="btn btn-default">View</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection