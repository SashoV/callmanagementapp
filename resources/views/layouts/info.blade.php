@error('internalError')
<div class="alert alert-danger alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <div>{{ $message }}</div>
</div>
@enderror


@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible text-center" role="alert">
    <span>{{ \Session::get('success') }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif