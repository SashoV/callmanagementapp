<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Delete this call?</p>
                <form action="{{ route('deleteCall', ['id' => $call->id]) }}" method="POST" class="deleteCallForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info">Yes</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No</button>
            </div>
        </div>
    </div>
</div>