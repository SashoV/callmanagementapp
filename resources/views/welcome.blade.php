@extends('layouts.master')

@section('title')
Personnel Ltd | Home
@endsection

@section('content')
<div class="container tableContainer">
    <div class="row">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <div class="text-center"><strong>{{session('success')}}</strong></div>

        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-hover mainTable">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Client</th>
                    <th>Client Type</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Type of Call</th>
                    <th>External Call Score</th>
                </tr>
                @foreach ($calls as $key => $call)
                <tr onclick="window.location='{{ route('call', ['id' => $call->id]) }}'">
                    <td>{{ $key + $calls->firstItem() }}</td>
                    <td>{{ $call->user }}</td>
                    <td>{{ $call->client }}</td>
                    <td>{{ $call->client_type }}</td>
                    <td>{{ $call->date }}</td>
                    <td>{{ $call->duration }}</td>
                    <td>{{ $call->type_of_call }}</td>
                    <td>{{ $call->external_call_score }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{ $calls->onEachSide(1)->links() }}
</div>
@endsection