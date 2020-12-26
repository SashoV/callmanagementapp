@extends('layouts.master')

@section('title')
Personnel Ltd | Edit Call
@endsection

@section('content')
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        @include('layouts.info')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Call</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('updateCall', $id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group @error('user') has-error @enderror">
                        <label for="user">User</label>
                        <select class="form-control" name="user" id="user">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                            <option value="{{ $user }}" @if($user==$call->user) {{ "selected" }}@endif>
                                {{ $user }}</option>
                            @endforeach
                        </select>
                        @error('user')
                        <span class="red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('client') has-error @enderror">
                        <label for="client">Client</label>
                        <select class="form-control" name="client" id="client">
                            <option value="">Select Client</option>
                            @foreach ($clients as $client)
                            <option value="{{ $client }}" @if($client==$call->client) {{ "selected" }}@endif>
                                {{ $client }}</option>
                            @endforeach
                        </select>
                        @error('client')
                        <span class="red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('client_type') has-error @enderror">
                        <label for="client_type">Client Type</label>
                        <input type="text" class="form-control" id="client_type" placeholder="Client Type"
                            name="client_type"
                            value="@if(old('client_type') == ''){{$call->client_type}}@else{{ old('client_type') }}@endif">
                        @error('client_type')
                        <span class="red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('date') has-error @enderror">
                        <label for="date">Date</label>
                        <input type="text" class="form-control" id="date" name="date"
                            value="@if(old('date') == ''){{$call->date}}@else{{ old('date')}}@endif" maxlength="20" placeholder="Select Date and Time">
                        @error('date')
                        <span class="red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('duration') has-error @enderror">
                        <label for="duration">Duration</label>
                        <input type="number" class="form-control" id="duration" name="duration"
                            value="@if(old('duration') == ''){{$call->duration}}@else{{ old('duration') }}@endif">
                        @error('duration')
                        <span class="red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('type_of_call') has-error @enderror">
                        <label for="type_of_call">Type of Call</label>
                        <select class="form-control" name="type_of_call" id="type_of_call">
                            <option value="">Select Type of Call</option>
                            @foreach ($types_of_calls as $type_of_call)
                            <option value="{{ $type_of_call }}" @if ($type_of_call==$call->type_of_call)
                                {{ "selected" }} @endif>
                                {{ $type_of_call }}</option>
                            @endforeach
                        </select>
                        @error('type_of_call')
                        <span class="red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('external_call_score') has-error @enderror">
                        <label for="external_call_score">External Call Score</label>
                        <input type="number" class="form-control" id="external_call_score" name="external_call_score"
                            value="@if(old('external_call_score') == ''){{$call->external_call_score}}@else{{ old('external_call_score') }}@endif">
                        @error('external_call_score')
                        <span class="red">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection