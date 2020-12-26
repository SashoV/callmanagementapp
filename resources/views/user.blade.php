@extends('layouts.master')

@section('title')
Personnel Ltd | User
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{$user}} last 5 interactions</h3>
            </div>
            <div class="panel-body">
                <p>User: <b>{{ $user }}</b></p>
                <p>Averige score (valid calls only): <b>{{number_format($avUserScore, 2)}}</b></p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Client Type</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Type of Call</th>
                            <th>External Call Score</th>
                        </tr>
                        @php
                        $index = 0;
                        @endphp
                        @foreach ($lastFiveCalls as $call)
                        @php
                        $index++;
                        @endphp
                        <tr>
                            <td>{{ $index }}</td>
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
        </div>
    </div>
</div>

@endsection