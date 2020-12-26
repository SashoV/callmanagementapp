@extends('layouts.master')

@section('title')
Personnel Ltd | Call
@endsection

@section('content')
<div class="container">
    <div class="row">
        @include('layouts.info')
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Call data</div>
            <div class="table-responsive">
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>User</th>
                        <th>Client</th>
                        <th>Client Type</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Type of Call</th>
                        <th>External Call Score</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>{{ $call->user }}</td>
                        <td>{{ $call->client }}</td>
                        <td>{{ $call->client_type }}</td>
                        <td>{{ $call->date }}</td>
                        <td>{{ $call->duration }}</td>
                        <td>{{ $call->type_of_call }}</td>
                        <td>{{ $call->external_call_score }}</td>
                        <td>
                            <a href="{{ route('editCall', ['id' => $call->id]) }}" class="btn btn-info"><span
                                    class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-trash"
                                    aria-hidden="true"></span></button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@include('layouts.deleteModal')
@endsection