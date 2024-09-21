<!-- Delete Modal -->
<div class="modal fade" id="modal-delete{{ isset($users->id) ? $users->id : null }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="deleteModalLabel">Confirm Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <p>Do you really want to delete <b>{{ $users->full_name }}</b>?</p>
          </div>
          <div class="modal-footer">
              <form action="{{ route('users.destroy', $users->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>
          </div>
      </div>
  </div>
</div>
