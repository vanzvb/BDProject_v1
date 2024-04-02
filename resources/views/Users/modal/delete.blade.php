<div class="modal fade" id="modal-delete{{ isset($user->id) ? $user->id : null }}">
    <div class="modal-dialog modal-delete">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete <b>{{ $user->name }} </b>  ?  </p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Delete</button>
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> --}}
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->